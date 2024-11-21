// Ambil elemen input password dan ikon toggle berdasarkan halaman
const passwordInput = document.getElementById('password-input');
const togglePasswordIcon = document.getElementById('register-toggle-password'); // Gunakan ID sesuai halaman

// Fungsi untuk toggle password visibility
function togglePasswordVisibility() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        // Ubah ikon menjadi mata terbuka
        togglePasswordIcon.src = 'source/eye-svgrepo-com.svg';
        togglePasswordIcon.alt = 'Hide Password';
    } else {
        passwordInput.type = 'password';
        // Ubah ikon kembali menjadi mata tertutup
        togglePasswordIcon.src = 'source/eye-slash-svgrepo-com.svg';
        togglePasswordIcon.alt = 'Show Password';
    }
}

// Tambahkan event listener untuk ikon toggle
togglePasswordIcon.addEventListener('click', togglePasswordVisibility);



// Ambil elemen modal
const modal = document.getElementById("terms-modal");

// Ambil elemen yang membuka modal (tautan syarat & ketentuan)
const termsLink = document.querySelector(".terms a");

// Ambil elemen untuk menutup modal (span .close)
const span = document.getElementsByClassName("close")[0];

// Ambil elemen tombol setuju dan checkbox
const setujuBtn = document.getElementById('setuju-btn');
const termsCheckbox = document.getElementById('terms-checkbox');

// Fungsi untuk membuka modal ketika tautan "syarat & ketentuan" diklik
termsLink.onclick = function (event) {
  event.preventDefault(); // Mencegah navigasi default dari tautan
  modal.style.display = "block"; // Menampilkan modal
}

// Fungsi untuk menutup modal ketika tombol "X" diklik
span.onclick = function () {
  modal.style.display = "none"; // Menutup modal
}

// Fungsi untuk menutup modal dan mengaktifkan checkbox ketika tombol "Setuju" ditekan
setujuBtn.addEventListener('click', function() {
  modal.style.display = 'none'; // Menutup modal
  termsCheckbox.disabled = false; // Mengaktifkan checkbox
  termsCheckbox.checked = true; // Checkbox otomatis tercentang
});

// Fungsi untuk menutup modal jika area luar modal di-klik
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none"; // Menutup modal jika area luar diklik
  }
}

// Fungsi untuk mencegah pencentangan manual pada checkbox
termsCheckbox.addEventListener('click', function(event) {
  if (termsCheckbox.disabled) {
    event.preventDefault(); // Mencegah checkbox dari dicentang
    alert("Anda harus membaca dan menyetujui syarat & ketentuan terlebih dahulu.");
  }
});



document.addEventListener('DOMContentLoaded', function () {
    // =======================
    // ERROR MODAL HANDLING
    // =======================
    const errorModal = document.getElementById('error-modal');
    const closeBtn = errorModal.querySelector('.close');

    // Tampilkan modal jika ada error message
    const errorMessages = document.querySelectorAll('.error-message');
    if (errorMessages.length > 0) {
      errorModal.style.display = 'block';
    }

    // Tutup modal saat tombol "X" diklik
    closeBtn.onclick = function () {
      errorModal.style.display = 'none';
    };

    // Tutup modal saat area luar diklik
    window.onclick = function (event) {
      if (event.target === errorModal) {
        errorModal.style.display = 'none';
      }
    };
});
