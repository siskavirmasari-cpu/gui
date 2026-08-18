<?php

namespace App\Http\Controllers;

use App\Models\FormatDokumen;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FormatDokumenController extends Controller
{
    public function index(): View
    {
        $dataBarang = Barang::orderBy('created_at', 'desc')->get()->map(function ($barang) {
            return [
                'value' => $barang->id,
                'label' => '[' . $barang->jenis_kegiatan . '] ' . $barang->nama_barang . ' (BL: ' . $barang->nomor_bl_awb . ')',
            ];
        });

        $jenisDokumen = [
            ['value' => 'bill-of-lading', 'label' => 'Bill of Lading (B/L)'],
            ['value' => 'invoice', 'label' => 'Invoice'],
            ['value' => 'packing-list', 'label' => 'Packing List'],
            ['value' => 'pib-peb', 'label' => 'PIB / PEB'],
            ['value' => 'surat-jalan', 'label' => 'Surat Jalan'],
            ['value' => 'dokumen-bea-cukai', 'label' => 'Dokumen Bea Cukai'],
            ['value' => 'foto-container', 'label' => 'Foto Container'],
        ];

        // Fetch saved formats
        $formatList = FormatDokumen::with('barang')->orderBy('created_at', 'desc')->get();

        return view('format.index', compact('dataBarang', 'jenisDokumen', 'formatList'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jenis_dokumen' => 'required|string',
            'nama_format' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $format = FormatDokumen::create($validated);
        $barang = Barang::find($validated['barang_id']);

        // Mapping jenis_dokumen to route names
        $routeMap = [
            'bill-of-lading' => 'format.bill',
            'invoice' => 'format.invoice',
            'packing-list' => 'format.packing',
            'pib-peb' => 'format.pib',
            'surat-jalan' => 'format.suratJalan',
            'dokumen-bea-cukai' => 'format.dokumenBea',
            'foto-container' => 'format.fotoContainer',
        ];

        $routeName = $routeMap[$validated['jenis_dokumen']] ?? 'format.index';

        return redirect()->route($routeName, ['format_id' => $format->id])
            ->with('success', 'Format dokumen berhasil disimpan.')
            ->with('barang', $barang)
            ->with('format', $format);
    }

    public function showBill(Request $request): View
    {
        $barang = null;
        $format = null;

        if ($request->session()->has('barang')) {
            $barang = $request->session()->get('barang');
        }
        if ($request->session()->has('format')) {
            $format = $request->session()->get('format');
        }

        return view('format.bill', compact('barang', 'format'));
    }

    public function saveBill(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'bl_no' => 'nullable|string',
            'booking_no' => 'nullable|string',
            'tanggal_bl' => 'nullable|date',
            'jenis_kegiatan' => 'nullable|string',
            'shipper_nama' => 'nullable|string',
            'shipper_alamat' => 'nullable|string',
            'shipper_negara' => 'nullable|string',
            'shipper_contact' => 'nullable|string',
            'consignee_nama' => 'nullable|string',
            'consignee_alamat' => 'nullable|string',
            'consignee_negara' => 'nullable|string',
            'consignee_npwp' => 'nullable|string',
            'consignee_contact' => 'nullable|string',
            'notify_nama' => 'nullable|string',
            'notify_alamat' => 'nullable|string',
            'notify_contact' => 'nullable|string',
            'nama_kapal' => 'nullable|string',
            'voyage_no' => 'nullable|string',
            'port_loading' => 'nullable|string',
            'port_discharge' => 'nullable|string',
            'place_receipt' => 'nullable|string',
            'place_delivery' => 'nullable|string',
            'tgl_keberangkatan' => 'nullable|date',
            'tgl_kedatangan' => 'nullable|date',
        ], [], [
            'bl_no' => 'B/L No',
            'booking_no' => 'Booking No',
            'tanggal_bl' => 'Tanggal B/L',
        ]);

        // Store the bill data in session for now, or you can save to database
        session(['bill_data' => $validated]);

        return redirect()->route('format.bill')
            ->with('success', 'Data Bill of Lading berhasil disimpan.');
    }

    // Generic methods untuk format lainnya
    private function showTemplate(string $template, Request $request): View
    {
        $barang = $request->session()->get('barang');
        $format = $request->session()->get('format');
        return view("format.$template", compact('barang', 'format'));
    }

    private function saveTemplateData(Request $request, string $route): RedirectResponse
    {
        $allData = $request->all();
        session(['document_data' => $allData]);
        
        // Get format and barang info from session
        $barang = session('barang');
        $format = session('format');
        $namaBarang = $barang ? $barang->nama_barang : 'Unknown';
        $namaDokumen = $format ? $format->jenis_dokumen : 'Unknown';
        
        $successMessage = "✅ Format '{$namaDokumen}' untuk '{$namaBarang}' berhasil disimpan!";
        
        return redirect()->route($route)
            ->with('success', $successMessage)
            ->with('saved_format', $format)
            ->with('saved_barang', $barang);
    }

    public function showInvoice(Request $request): View { return $this->showTemplate('invoice', $request); }
    public function saveInvoice(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.invoice'); }

    public function showPacking(Request $request): View { return $this->showTemplate('packing', $request); }
    public function savePacking(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.packing'); }

    public function showPib(Request $request): View { return $this->showTemplate('pib', $request); }
    public function savePib(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.pib'); }

    public function showPeb(Request $request): View { return $this->showTemplate('peb', $request); }
    public function savePeb(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.peb'); }

    public function showDokumenBea(Request $request): View { return $this->showTemplate('dokumenBea', $request); }
    public function saveDokumenBea(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.dokumenBea'); }

    public function showFotoContainer(Request $request): View { return $this->showTemplate('fotoContainer', $request); }
    public function saveFotoContainer(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.fotoContainer'); }

    public function showSuratJalan(Request $request): View { return $this->showTemplate('suratJalan', $request); }
    public function saveSuratJalan(Request $request): RedirectResponse { return $this->saveTemplateData($request, 'format.suratJalan'); }

    // View detail format dengan data JSON
    public function viewFormat(Request $request, $id)
    {
        $format = FormatDokumen::with('barang')->find($id);

        if (!$format) {
            return response()->json(['error' => 'Format tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $format->id,
            'nama_format' => $format->nama_format,
            'deskripsi' => $format->deskripsi,
            'jenis_dokumen' => $format->jenis_dokumen,
            'barang' => $format->barang ? [
                'id' => $format->barang->id,
                'nama_barang' => $format->barang->nama_barang,
                'nomor_bl_awb' => $format->barang->nomor_bl_awb,
                'jenis_kegiatan' => $format->barang->jenis_kegiatan,
                'negara_asal' => $format->barang->negara_asal ?? 'Indonesia',
                'jumlah_barang' => $format->barang->jumlah_barang ?? '0',
            ] : null,
            'created_at' => $format->created_at->format('d M Y H:i'),
        ]);
    }
}
