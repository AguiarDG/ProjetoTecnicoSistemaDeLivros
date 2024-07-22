$(function () {
  $('.select2').select2({
    theme: 'bootstrap-5',
    placeholder: "Selecione um ou mais autores",
    allowClear: true,
    width: '100%'
  });

  if (document.getElementById('form-livro')) {
    var cleave = new Cleave('#currency', {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand',
      delimiter: '.',
      numeralDecimalMark: ',',
      numeralDecimalScale: 2
    });

    document.getElementById('form-livro').addEventListener('submit', function (e) {
      var currencyField = document.getElementById('currency');
      var rawValue = cleave.getRawValue(); // Obtém o valor sem o prefixo
      currencyField.value = rawValue;
    });

    document.getElementById('ano_publicacao').addEventListener('input', function (e) {
      var input = e.target;
      var maxLength = 4;
      var currentLength = input.value.length;

      if (currentLength > maxLength) {
        input.value = input.value.slice(0, maxLength);
      }
    });
  }
  const inputsClassLength40 = document.querySelectorAll('.maxlength-40');
  const maxLength40 = 40;

  inputsClassLength40.forEach(input => {
    const charCountElement = input.nextElementSibling;
    let currentLength = input.value.length;

    charCountElement.innerText = `${currentLength}/${maxLength40} caracteres`;

    input.addEventListener('input', function (e) {
      const charCountElement = input.nextElementSibling;
      let currentLength = input.value.length;

      if (currentLength > maxLength40) {
        input.value = input.value.slice(0, maxLength40);
        currentLength = maxLength40;
      }

      charCountElement.innerText = `${currentLength}/${maxLength40} caracteres`;
    })
  });

  const inputsClassLength20 = document.querySelectorAll('.maxlength-20');
  const maxLength20 = 20;

  inputsClassLength20.forEach(input => {
    const charCountElement = input.nextElementSibling;
    let currentLength = input.value.length;

    charCountElement.innerText = `${currentLength}/${maxLength20} caracteres`;

    input.addEventListener('input', function (e) {
      const charCountElement = input.nextElementSibling;
      let currentLength = input.value.length;

      if (currentLength > maxLength20) {
        input.value = input.value.slice(0, maxLength20);
        currentLength = maxLength20;
      }

      charCountElement.innerText = `${currentLength}/${maxLength20} caracteres`;
    })
  });

});
