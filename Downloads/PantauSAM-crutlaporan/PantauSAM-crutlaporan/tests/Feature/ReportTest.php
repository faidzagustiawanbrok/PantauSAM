<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Report;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test scenario: Menyimpan data baru dengan input valid.
     */
    public function test_store_method_with_valid_input(): void
    {
        // Gunakan Storage palsu untuk file gambar
        Storage::fake('local'); // Pastikan Anda menggunakan disk yang benar

        // Data yang akan dikirimkan melalui request
        $data = [
            'Nama_Lokasi' => 'Test Lokasi',
            'Latitude' => '12.345678',
            'Longitude' => '98.765432',
            'detail' => 'Deskripsi lokasi',
            'image' => UploadedFile::fake()->image('test_image.jpg'), // File gambar palsu
        ];

        // Kirim POST request ke metode store
        $response = $this->post(route('upload.store'), $data);

        // Assert bahwa respons adalah redirect ke dashboard
        $response->assertRedirect(route('dashboard'));

        // Assert bahwa data disimpan di database
        $this->assertDatabaseHas('reports', [
            'Nama_Lokasi' => 'Test Lokasi',
            'Latitude' => '12.345678',
            'Longitude' => '98.765432',
            'detail' => 'Deskripsi lokasi',
        ]);

        // Memastikan file gambar berhasil disalin ke penyimpanan palsu
        // Gunakan assertFileExists untuk memastikan file disalin
        // Storage::disk('local')->assertFileExists('images/' . $data['image']->hashName());
    }

    public function test_store_method_with_invalid_input(): void
{
    // Data tidak valid (field kosong atau image kosong)
    $data = [
        'Nama_Lokasi' => '',  // Kosongkan Nama_Lokasi
        'Latitude' => '',     // Kosongkan Latitude
        'Longitude' => '',    // Kosongkan Longitude
        'detail' => '',       // Kosongkan detail
        'image' => null,      // Image kosong
    ];

    // Kirim POST request ke metode store
    $response = $this->post(route('upload.store'), $data);

    // Assert bahwa respons adalah redirect kembali ke halaman store dengan error
    $response->assertSessionHasErrors(['Nama_Lokasi', 'Latitude', 'Longitude', 'detail', 'image']);
}

public function test_update_method_with_valid_input(): void
{
    // Buat data awal
    $report = Report::factory()->create([
        'status' => 'diproses',
    ]);

    $data = [
        'status' => 'selesai',  // Perbarui status menjadi selesai
    ];

    // Kirim PUT request ke metode update
    $response = $this->put(route('upload.update', $report->id), $data);

    // Assert bahwa respons adalah redirect ke dashboard
    $response->assertRedirect(route('dashboard'));

    // Assert bahwa data di database diperbarui
    $this->assertDatabaseHas('reports', [
        'id' => $report->id,
        'status' => 'selesai',  // Status harus diperbarui
    ]);
}

public function test_update_method_with_invalid_input(): void
{
    // Buat data awal
    $report = Report::factory()->create([
        'status' => 'diproses',
    ]);

    // Data tidak valid (status kosong)
    $data = [
        'status' => '',  // Status harus ada
    ];

    // Kirim PUT request ke metode update
    $response = $this->put(route('upload.update', $report->id), $data);

    // Assert bahwa respons adalah redirect kembali ke halaman edit dengan error
    $response->assertSessionHasErrors(['status']);
}

public function test_destroy_method_removes_data(): void
{
    // Buat data awal
    $report = Report::factory()->create();

    // Kirim DELETE request ke metode destroy
    $response = $this->delete(route('upload.destroy', $report->id));

    // Assert bahwa respons adalah redirect ke dashboard
    $response->assertRedirect(route('dashboard'));

    // Assert bahwa data telah dihapus dari database
    $this->assertSoftDeleted($report);
}

}
