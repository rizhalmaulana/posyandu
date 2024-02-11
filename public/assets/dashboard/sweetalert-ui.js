/**
 * Sweet Alerts
 */

'use strict';

(function () {
  const basicAlert = document.querySelector('#basic-alert'),
    infoBalitaDisableKunjungan = document.querySelector('#info-balita-disable-kunjungan'),
    infoBalitaPendaftarBaru = document.querySelector('#info-balita-pendaftar-baru');

  if (infoBalitaDisableKunjungan) {
    infoBalitaDisableKunjungan.onclick = function () {
      Swal.fire({
        title: 'Informasi!',
        text: 'Kamu sudah melakukan pemeriksaan pada bayi/balita/APRAS tersebut',
        icon: 'info',
        customClass: {
          confirmButton: 'btn btn-primary waves-effect waves-light'
        },
        buttonsStyling: false
      });
    };
  }

  if (infoBalitaPendaftarBaru) {
    infoBalitaPendaftarBaru.onclick = function() {
      var idBalita = document.getElementById('info-balita-pendaftar-baru').value; 

      // Display the next question using SweetAlert
      Swal.fire({
        title: "Pertanyaan 1",
        text: "Apakah ini pertama kali bayi/balita di timbang di posyandu ini?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, pernah",
        cancelButtonText: "Tidak",
        allowOutsideClick: false,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Terima kasih!",
            text: "Anda akan di arahkan langsung menuju halaman periksa.",
            icon: "success"
          }).then(function() {
            localStorage.setItem('status_balita', 'B');
            window.location.href = '/dashboard/periksa/' + idBalita;
          });

          // Get data from localStorage
          // const value = localStorage.getItem('status_balita');

          // Remove data from localStorage
          // localStorage.removeItem('status_balita');
        } else {
          Swal.fire({
            title: "Pertanyaan 2",
            text: "Apakah balita mengikuti kegiatan posyandu 1 bulan yang lalu?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya, pernah",
            cancelButtonText: "Tidak",
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: "Terima kasih!",
                text: "Anda akan di arahkan langsung menuju halaman periksa.",
                icon: "success"
              }).then(function() {
                localStorage.setItem('status_balita', 'B');
                window.location.href = '/dashboard/periksa/' + idBalita;
              });
            } else {
              Swal.fire({
                title: "Terima kasih!",
                text: "Anda akan di arahkan langsung menuju halaman periksa.",
                icon: "success"
              }).then(function() {
                localStorage.setItem('status_balita', 'O');
                window.location.href = '/dashboard/periksa/' + idBalita;
              });
            }

            // Get data from localStorage
            // const value = localStorage.getItem('status_balita');

            // Remove data from localStorage
            // localStorage.removeItem('status_balita');
          });
        }
      }); 
    }
  }
})();
