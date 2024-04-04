$(document).ready(function() {
  $('input[type-currency="IDR"]').each(function() {
    formatCurrency($(this));
  });
});

function formatCurrency(element) {
  element.on('keyup', function(e) {
    let cursorPosition = this.selectionStart;
    let value = parseInt(this.value.replace(/[^,\d]/g, ""));
    let originalLength = this.value.length;
    
    if (isNaN(value)) {
      this.value = "";
    } else {
      this.value = value.toLocaleString("id-ID", {
        currency: "IDR",
        style: "currency",
        minimumFractionDigits: 0
      });
      cursorPosition = this.value.length - originalLength + cursorPosition;
      this.setSelectionRange(cursorPosition, cursorPosition);
    }
  });

  element.on('focus', function(e) {
    let value = parseInt(this.value.replace(/[^,\d]/g, ""));
    if (!isNaN(value)) {
      this.value = value.toLocaleString("id-ID", {
        currency: "IDR",
        style: "currency",
        minimumFractionDigits: 0
      });
    }
  });

  element.on('blur', function(e) {
    let value = parseInt(this.value.replace(/[^,\d]/g, ""));
    if (!isNaN(value)) {
      this.value = value.toLocaleString("id-ID", {
        currency: "IDR",
        style: "currency",
        minimumFractionDigits: 0
      });
    }
  });
}
