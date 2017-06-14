<?php

namespace App\Http\Controllers;

use App\Repositories\TransportRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class TransportController extends Controller
{
    private $transport;

    /**
     * TransportController constructor.
     * @param TransportRepository $transportRepository
     */
    public function __construct(TransportRepository $transportRepository)
    {
        $this->transport = $transportRepository;
    }

    /**
     * List all transports
     *
     * @return $this
     */
    public function index()
    {
        $transports = $this->transport->getTransports();
        return view('/frontend/transport/index')->with(['transports' => ($transports) ? $transports : array()]);
    }

    /**
     * Add transports
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('/frontend/transport/add');
    }

    /**
     * Save need
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $messages = [
            'name.required' => 'නම ඇතුලත් කිරීම අනිවාර්යයි',
            'telephone.required' => 'දුරකථන අංක ඇතුලත් කිරීම අනිවාර්යයි',
            'address.required' => 'ලිපිනය ඇතුලත් කිරීම අනිවාර්යයි',
            'city.required' => 'නගරය/ප්‍රා.ලේ කොට්ටාසය ඇතුලත් කිරීම අනිවාර්යයි',
            'availability.required' => 'ගමන් කල හැකි ස්ථාන ඇතුලත් කිරීම අනිවාර්යයි',
            'time_possibility.required' => 'ලබා දිය හැකි කාලය ඇතුලත් කිරීම අනිවාර්යයි',
            'type.required' => 'වාහන වර්ගය ඇතුලත් කිරීම අනිවාර්යයි',
            'is_fuel.required' => 'ඉන්ධන සමග ලබා දෙනවාද යන්න ඇතුලත් කිරීම අනිවාර්යයි',
            'g-recaptcha-response.required' => 'ඔබව තහවුරු කිරීම අනිවාර්යයි'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'telephone' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'availability' => 'required||max:200',
            'time_possibility' => 'required||max:200',
            'type' => 'required||max:50',
            'is_fuel' => 'required||max:20',
            'g-recaptcha-response' => 'required|captcha'
        ], $messages);

        if ($validator->fails()) {
            return redirect('/transports/add')
                ->with('isSuccess', false)
                ->with('errors', $validator->errors()->all())
                ->withInput();
        } else {
            $response = $this->transport->addTransport($request->all());
            if ($response) {
                return redirect('/transports')
                    ->with('isSuccess', true)
                    ->with('message', 'Transports added.');
            } else {
                return redirect('/transports/add')
                    ->with('isSuccess', false)
                    ->with('errors', ['Transports adding failed. Please try again.'])
                    ->withInput();
            }
        }
    }

    /**
     * Show transport
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $transport = $this->transport->findTransport($id);

        if ($transport) {
            return Response::json([
                'isSuccess' => true,
                'transport' => $transport,
            ]);
        } else {
            return Response::json([
                'isSuccess' => false
            ]);
        }
    }
}
