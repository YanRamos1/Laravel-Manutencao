function ValidaGenero(genero) {
    if(genero != 'M' && genero != 'F') {
        genero.focus();
        return false;
    }
}

function ValidaNome(nome) {
    //remove espaços em branco e numeros
    nome = nome.replace(/\s/g, '');
    if(nome.length < 3) {
        return false;
    }else
        return nome;
}

function ValidaSerial(serial) {
    //remove espaços em branco e torna turma minuscula
    serial = serial.replace(/\s/g, '');
    serial = serial.toUpperCase();
    if(serial.length < 3) {
        return false;
    }else
        return serial;
}

function maskToMoney($value){
    //mask when input is a number
    $value = $value.replace(/\D/g, '');
    $value = $value.replace(/(\d)(\d{2})$/, '$1,$2');
    return $value;
}
function formatToCurrency($amout) {
    return "$" + $amout.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
};

