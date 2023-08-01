<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = session();
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->db = db_connect();
    }

    public function loginValidation()
    {
        return $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email belum diisi',
                    'valid_email' => 'Please enter a valid email'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password belum diisi',
                ]
            ]
        ]);
    }

    public function registerValidation()
    {
        return $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email belum diisi',
                    'valid_email' => 'Please enter a valid email'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password belum diisi'
                ]
            ],
            'retypePass' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password belum diisi',
                    'matches' => 'Password not match'
                ]
            ]
        ]);
    }

    public function biodata()
    {
        return $this->validate([
            'name' => [
                'rules' => 'required|max_length[50]'
            ],
            'age' => [
                'rules' => 'required|max_length[2]',
            ],
            'gender' => [
                'rules' => 'required',
            ],
            'height' => [
                'rules' => 'required'
            ],
            'weight' => [
                'rules' => 'required'
            ],
        ]);
    }

    public function form()
    {
        return $this->validate([
            'rutin' => [
                'rules' => 'required'
            ],
            'atlet' => [
                'rules' => 'required'
            ],
            'bagianotot' => [
                'rules' => 'required'
            ],
            'specific' => [
                'rules' => 'required'
            ]
        ]);
    }
}
