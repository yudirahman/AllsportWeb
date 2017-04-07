jQuery.extend(jQuery.validator.messages, {
    required: "Form harus di isi.",
    remote: "Please fix this field.",
    email: "Masukkan alamat email yang benar.",
    url: "URL tidak valid.",
    date: "Penulisan tanggal salah.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Hanya nomor saja.",
    digits: "Masukkan hanya digit saja.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Fiel tidak sama dengan sebelumnya.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Tidak boleh lebih dari {0} karakter."),
    minlength: jQuery.validator.format("Tidak boleh kurang dari {0} karakter."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});