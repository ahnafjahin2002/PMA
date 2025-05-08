<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function payViaAjax(Request $request)
    {
        //\Log::info('Request Data:', $request->all());
        $transactionId = uniqid();
        

        $amount = $request->input('amount', 1000); // fallback just in case
        \Log::info('Amount received:', ['amount' => $request->input('amount')]);
        $postData = [
            'store_id'     => env('SSLCZ_STORE_ID'),
            'store_passwd' => env('SSLCZ_STORE_PASSWORD'),
            'total_amount' => $amount,
            'currency'     => "BDT",
            'tran_id'      => $transactionId,
            'success_url'  => route('payment.success'),
            'fail_url'     => route('payment.fail'),
            'cancel_url'   => route('payment.cancel'),
    
            'cus_name'     => "Ahnaf",
            'cus_email'    => "ahnaf@example.com",
            'cus_add1'     => "Dhaka",
            'cus_phone'    => "01711111111",
        ];
        //\Log::info('POST Data Sent to SSLCommerz:', $postData);
        $apiURL = 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';
        
        //\Log::info('Sending data to SSLCommerz: ', $postData);
        $response = Http::asForm()->post($apiURL, $postData);
        $result = $response->json();
        //\Log::info('SSLCommerz Response: ', $result);
        //dd($result);
        
        if (!isset($result['GatewayPageURL']) || empty($result['GatewayPageURL'])) {
            return back()->withErrors([
                'message' => $result['failedreason'] ?? 'Payment URL missing',
            ]);
        }
    
        return redirect()->away($result['GatewayPageURL']);
    }
    
    public function success(Request $request)
    {
        return "Payment Successful! Transaction ID: " . $request->tran_id;
    }

    public function fail()
    {
        return "Payment Failed.";
    }

    public function cancel()
    {
        return "Payment Cancelled.";
    }
}
