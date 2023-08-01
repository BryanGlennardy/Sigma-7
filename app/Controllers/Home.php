<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    protected $classesModel;
    protected $exercisesModel;
    protected $diagnosisModel;
    protected $frequencyModel;
    protected $intensityModel;
    protected $musclepartModel;
    protected $usersModel;

    // Constructor, assigning models to variables
    public function __construct()
    {
        $this->classesModel = model('ClassesModel');
        $this->exercisesModel = model('ExercisesModel');
        $this->diagnosisModel = model('DiagnosisModel');
        $this->frequencyModel = model('FrequencyModel');
        $this->intensityModel = model('IntensityModel');
        $this->musclepartModel = model('MusclepartModel');
        $this->usersModel = model('UsersModel');
        $this->session = session();
    }

    // Home
    public function index()
    {
        return view('index');
    }

    // Function register (view)
    public function addRegister()
    {
        $data['validation'] = \Config\Services::validation();
        return view('register', $data);
    }

    // Function utk register (model)
    public function registerUser()
    {
        if (!$this->registerValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Home/addRegister')->withInput()->with('validation', $validation);
        }

        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));


        // Kirim data ke model
        $this->usersModel->insertDataRegister($email, $password);

        // Message
        $this->session->setFlashdata('message', 'Registrasi Berhasil');

        return redirect()->to('/');
    }

    // Login User (view)
    public function login()
    {
        $data['validation'] = \Config\Services::validation();
        return view('login', $data);
    }

    // Login User
    public function loginUser()
    {
        if (!$this->loginValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Home/login')->withInput()->with('validation', $validation);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $loginSuccess = $this->usersModel->verifyLogin($email, $password);

        // Error tak terduga
        if (!$loginSuccess) {
            $this->session->setFlashdata('message', 'Email atau Password yang anda masukkan salah');
            return redirect()->to('/Home/login')->withInput();
        }

        // Message
        $this->session->setFlashdata('message', 'Login Berhasil');

        $data = $loginSuccess;
        $data['log_sess'] = TRUE;

        $this->session->set($data);

        return redirect()->to('/');
    }

    // Logout, session destroyed
    public function logoutUser()
    {
        $this->session->destroy();
        $this->session->set('log_sess', 'false');
        return redirect()->to('/');
    }

    // Check login session
    public function isLoggedin()
    {
        return $this->session->get('log_sess');
    }

    // Exercises
    public function exercisesPage()
    {
        $data = [
            'muscleparts' => $this->musclepartModel->getMuscleparts(),
            'exercises' => $this->exercisesModel->getExercises(),
            'classes' => $this->classesModel->getClasses()
        ];
        return view('exercises', $data);
    }

    // About
    public function aboutPage()
    {
        return view('about');
    }

    // Form
    public function formPage()
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        return view('form');
    }

    // Diagnosis
    public function diagnosisPage($data)
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        return view('diagnosis', $data);
    }

    // Biodata Form (Index Page)
    public function acceptBiodata()
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        if (!$this->biodata()) {
            return redirect()->to('/')->withInput();
        }

        $biodata = [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age'),
            'gender' => $this->request->getPost('gender'),
            'height' => $this->request->getPost('height'),
            'weight' => $this->request->getPost('weight')
        ];
        $this->session->set($biodata);

        return $this->formPage();
    }

    // Form
    public function acceptForm()
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        if (!$this->form()) {
            return redirect()->to('/Home/formPage')->withInput();
        }

        $form = [
            'rutin' => $this->request->getPost('rutin'),
            'atlet' => $this->request->getPost('atlet'),
            'bagianotot' => $this->request->getPost('bagianotot'),
            'specific' => $this->request->getPost('specific')
        ];
        $this->session->set($form);
        $user = $this->session->get();
        return $this->diagnose($user);
    }

    public function diagnose($user)
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        $diagnosis = $this->diagnosisModel->getDiagnosis($user);

        $class = $this->classesModel->getClassesById($diagnosis['class']);
        $musclepart = $this->musclepartModel->getMusclepartById($diagnosis['musclepart']);
        $intensity = $this->intensityModel->getIntensityById($diagnosis['intensity']);
        $frequency = $this->frequencyModel->getFrequencyById($diagnosis['frequency']);

        $data = [
            'name' => $user['name'],
            'age' => $user['age'],
            'gender' => $user['gender'],
            'height' => $user['height'],
            'weight' => $user['weight'],
            'bmi' => $diagnosis['bmi'],
            'class' => $class['name'],
            'musclepart' => $musclepart['name'],
            'intensity' => $intensity['min_time'] . ' - ' . $intensity['max_time'],
            'frequency' => $frequency['days_per_week'],
            'user_email' => $user['email'],
            'tanggal_test' => Time::now('Asia/Jakarta')
        ];

        // kirim data ke model
        $this->diagnosisModel->insertDiagnosis($data);

        $data['exercises'] = $this->exercisesModel->getExercisesByMusclepartNoDupe($musclepart['id']);
        $data['sets'] = $class['sets'];
        return $this->diagnosisPage($data);
    }

    // History
    public function history()
    {
        if (!$this->isLoggedin()) return redirect()->to('/Home/login');

        $emailUser = session()->get('email');
        $data = [
            'result' => $this->diagnosisModel->getDetailDiagnosisUser($emailUser),
            'validation' => \Config\Services::validation()
        ];

        return view('history', $data);
    }
}
