// Ambil elemen input password dan ikon toggle untuk form login
const loginPasswordInput = document.querySelector('.login-container #password-input');
const loginTogglePasswordIcon = document.querySelector('.login-container #login-toggle-password');

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

// Aktifkan fungsi untuk form login
togglePasswordVisibility(loginPasswordInput, loginTogglePasswordIcon);


const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

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




