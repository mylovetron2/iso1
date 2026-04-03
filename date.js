 webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '/',
    dateSigns: '/',
    patterns: {
        d: "dd/mm/yy"
    }
}
};