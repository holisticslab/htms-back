<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{
    private static $endpoint = 'https://www.billplz-sandbox.com/api/v3';
    private static $secret_key = '6e0d4f71-8559-4f01-accf-136612c040ef';

    private function getHeaders() {
        return array(
            'Authorization' => 'Basic '. base64_encode(self::$secret_key),
            'Cache-Control' => 'no-cache',
            'Accept' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE, OPTIONS'
        );
    }

    public function getCollection() {
        $response = Http::withHeaders($this->getHeaders())->get(self::$endpoint . '/collections');
        return $response->json();
    }

    public function createCollection(Request $request) {
        $title = array('title' => $request->input('title'));
        $response = Http::withHeaders($this->getHeaders())->post(self::$endpoint . '/collections', $title);
        return $response->json();
    }

    public function createBill(Request $request) {
        $data = array(
            'collection_id' => $request->input('collection_id'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'callback_url' => $request->input('callback_url'),
            'redirect_url' => $request->input('redirect_url')
        );
        $response = Http::withHeaders($this->getHeaders())->post(self::$endpoint . '/bills', $data);
        return $response;
    }

    public function getPaymentGateways() {
        $response = Http::withHeaders($this->getHeaders())->get(self::$endpoint . '/payment_gateways');
        return $response->json();
    }

    public function checkBankAccount($id) {
        $response = Http::withHeaders($this->getHeaders())->get(self::$endpoint . '/check/bank_account_number/' . $id);
        return $response->json();
    }
}