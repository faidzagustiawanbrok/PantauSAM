
// Ambil elemen input password dan ikon toggle untuk form register
const registerPasswordInput = document.querySelector('.register-container #password-input');
const registerTogglePasswordIcon = document.querySelector('.register-container #register-toggle-password');

// Fungsi untuk toggle password visibility
function togglePasswordVisibility(passwordInput, togglePasswordIcon) {
    // Periksa apakah elemen input dan ikon tersedia
    if (!passwordInput || !togglePasswordIcon) return;

    togglePasswordIcon.addEventListener('click', function () {
        // Ubah tipe input dan ikon berdasarkan kondisi
        const isPasswordHidden = passwordInput.type === 'password';
        passwordInput.type = isPasswordHidden ? 'text' : 'password';
        togglePasswordIcon.src = isPasswordHidden
            ? 'source/eye-svgrepo-com.svg'
            : 'source/eye-slash-svgrepo-com.svg';
        togglePasswordIcon.alt = isPasswordHidden ? 'Hide Password' : 'Show Password';
    });
}

// Aktifkan fungsi untuk form register
togglePasswordVisibility(registerPasswordInput, registerTogglePasswordIcon);



// Mengambil elemen modal, tombol dan checkbox
var modal = document.getElementById("terms-modal");
var termsLink = document.getElementById("terms-link");
var closeModalBtn = document.getElementById("closeModalBtn");
var setujuBtn = document.getElementById("setuju-btn");
var termsCheckbox = document.getElementById("terms-checkbox");

// Menampilkan modal saat mengklik tautan "syarat & ketentuan"
termsLink.onclick = function(event) {
  event.preventDefault();  // Mencegah halaman berpindah saat mengklik tautan
  modal.style.display = "block";
}

// Menutup modal saat mengklik "X"
closeModalBtn.onclick = function() {
  modal.style.display = "none";
}

// Menutup modal dan mencentang checkbox saat mengklik tombol "Setuju"
setujuBtn.onclick = function() {
  termsCheckbox.checked = true; // Centang checkbox
  modal.style.display = "none"; // Tutup modal
}

// Menutup modal jika pengguna mengklik di luar modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


// Fungsi untuk mencegah pencentangan manual pada checkbox
termsCheckbox.addEventListener('click', function(event) {
  if (termsCheckbox.disabled) {
    event.preventDefault(); // Mencegah checkbox dari dicentang
    alert("Anda harus membaca dan menyetujui syarat & ketentuan terlebih dahulu.");
  }
});




