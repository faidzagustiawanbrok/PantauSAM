const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')
const dropdowns = document.querySelectorAll('.dropdown');

// Fungsi untuk toggle sidebar (membuka dan menutup sidebar)
function toggleSidebar() {
    sidebar.classList.toggle('close');
    toggleButton.classList.toggle('rotate');
    closeAllSubMenus();
  }

  // Fungsi untuk menutup sidebar
  function closeSidebar() {
    if (!sidebar.classList.contains('close')) {
      sidebar.classList.add('close');
      toggleButton.classList.add('rotate');
    }
    closeAllSubMenus();
  }

  // Fungsi untuk membuka sub-menu
  function toggleSubMenu(button) {
    if (!button.nextElementSibling.classList.contains('show')) {
      closeAllSubMenus();
    }
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');

    if (sidebar.classList.contains('close')) {
      sidebar.classList.remove('close');
      toggleButton.classList.remove('rotate');
    }
  }

  // Fungsi untuk menutup semua sub-menu
  function closeAllSubMenus() {
    Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
      ul.classList.remove('show');
      ul.previousElementSibling.classList.remove('rotate');
    });
  }

  // Event listener untuk tombol toggle sidebar
  toggleButton.addEventListener('click', toggleSidebar);

/*Dropdown Menu*/
dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const menu = dropdown.querySelector('.dropdown-menu');
    const options = dropdown.querySelectorAll('.dropdown-menu li');
    const selected = dropdown.querySelector('.selected');

    // Toggle dropdown
    select.addEventListener('click', () => {
        menu.classList.toggle('menu-open');
        select.classList.toggle('select-clicked');
    });

    // Option click handling
    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.textContent = option.textContent;
            menu.classList.remove('menu-open');
            select.classList.remove('select-clicked');

            // Here you can add code to handle the status change
            const reportId = dropdown.dataset.report;
            const newStatus = option.dataset.value;
            console.log(`Report ${reportId} status changed to: ${newStatus}`);
        });
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', (e) => {
    dropdowns.forEach(dropdown => {
        if (!dropdown.contains(e.target)) {
            const menu = dropdown.querySelector('.dropdown-menu');
            const select = dropdown.querySelector('.select');
            menu.classList.remove('menu-open');
            select.classList.remove('select-clicked');
        }
    });
});
