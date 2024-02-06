/**
 * Edit User
 */

'use strict';

// Select2 (jquery)
$(function () {
  const select2 = $('.select2');

  // Select2 Country
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }
});

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // variables
    const modalEditUserTaxID = document.querySelector('.modal-edit-tax-id');
    const modalEditUserPhone = document.querySelector('.phone-number-mask');

    // Prefix
    if (modalEditUserTaxID) {
      new Cleave(modalEditUserTaxID, {
        prefix: 'TIN',
        blocks: [3, 3, 3, 4],
        uppercase: true
      });
    }

    // Phone Number Input Mask
    if (modalEditUserPhone) {
      new Cleave(modalEditUserPhone, {
        phone: true,
        phoneRegionCode: 'US'
      });
    }

    // Edit user form validation
    FormValidation.formValidation(document.getElementById('editUserForm'), {
      fields: {
        modalEditUserFirstName: {
          validators: {
            notEmpty: {
              message: 'Silakan masukkan nama depan Anda'
            },
            regexp: {
              regexp: /^[a-zA-Zs]+$/,
              message: 'Nama depan hanya boleh terdiri dari abjad'
            }
          }
        },
        modalEditUserLastName: {
          validators: {
            notEmpty: {
              message: 'Silakan masukkan nama belakang Anda'
            },
            regexp: {
              regexp: /^[a-zA-Zs]+$/,
              message: 'Nama belakang hanya boleh terdiri dari abjad'
            }
          }
        },
        modalEditUserName: {
          validators: {
            notEmpty: {
              message: 'Silakan masukkan nama pengguna Anda'
            },
            stringLength: {
              min: 6,
              max: 30,
              message: 'Panjang nama harus lebih dari 6 dan kurang dari 30 karakter'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9 ]+$/,
              message: 'Nama hanya boleh terdiri atas abjad, angka, dan spasi'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    });
  })();
});
