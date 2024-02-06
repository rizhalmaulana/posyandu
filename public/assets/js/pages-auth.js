/**
 *  Pages Authentication
 */

'use strict';
const formAuthentication = document.querySelector('#formAuthentication');

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Form validation for Add new record
    if (formAuthentication) {
      const fv = FormValidation.formValidation(formAuthentication, {
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukkan username anda'
              },
              stringLength: {
                min: 6,
                message: 'Nama pengguna harus lebih dari 6 karakter'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Silahkan masukkan email anda'
              },
              emailAddress: {
                message: 'Silakan masukkan alamat email yang valid'
              }
            }
          },
          'email-username': {
            validators: {
              notEmpty: {
                message: 'Silakan masukkan email anda'
              },
              stringLength: {
                min: 6,
                message: 'Nama pengguna harus lebih dari 6 karakter'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'Silakan masukkan kata sandi Anda'
              },
              stringLength: {
                min: 6,
                message: 'Kata sandi harus lebih dari 6 karakter'
              }
            }
          },
          'confirm-password': {
            validators: {
              notEmpty: {
                message: 'Harap konfirmasi kata sandi anda'
              },
              identical: {
                compare: function () {
                  return formAuthentication.querySelector('[name="password"]').value;
                },
                message: 'Kata sandi dan konfirmasinya tidak sama'
              },
              stringLength: {
                min: 6,
                message: 'Kata sandi harus lebih dari 6 karakter'
              }
            }
          },
          terms: {
            validators: {
              notEmpty: {
                message: 'Harap setujui syarat & ketentuan'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: '.mb-3'
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),

          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      });
    }

    //  Two Steps Verification
    const numeralMask = document.querySelectorAll('.numeral-mask');

    // Verification masking
    if (numeralMask.length) {
      numeralMask.forEach(e => {
        new Cleave(e, {
          numeral: true
        });
      });
    }
  })();
});
