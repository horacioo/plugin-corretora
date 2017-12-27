jQuery(function ($) {
    jQuery("#placaForm").mask("aaa-9999");
    jQuery("#telefoneForm").mask("(99)9999-9999");
    jQuery("#celularForm").mask("(99)9-9999-9999");
    jQuery("#whatsappForm").mask("(99)9-9999-9999");
    jQuery("#cpfForm").mask("999.999.999-99");
    jQuery("#data").mask("99/99/9999", {placeholder: "mm/dd/yyyy"});
});