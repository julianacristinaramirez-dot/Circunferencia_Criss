/* 
 * Lógica para poder calcular la circunferencia:
 * Área = π * r²
 * Perímetro = 2 * π * r
 */

function calcularCircunferencia() {
    const radioInput = document.getElementById('txtRadio');
    const areaInput = document.getElementById('txtA');
    const perimetroInput = document.getElementById('txtP');

    if (!radioInput || !areaInput || !perimetroInput) {
        return;
    }

    const radio = parseFloat(radioInput.value);

    if (isNaN(radio) || radio <= 0) {
        alert('Ingrese un radio válido mayor a cero');
        radioInput.focus();
        return;
    }

    // Fórmulas de la circunferencia
    const area = Math.PI * (radio * radio);
    const perimetro = 2 * Math.PI * radio;

    areaInput.value = area.toFixed(2);
    perimetroInput.value = perimetro.toFixed(2);
}

document.addEventListener('DOMContentLoaded', function () {
    const radioInput = document.getElementById('txtRadio');

    if (radioInput) {
        radioInput.addEventListener('input', calcularCircunferencia);
    }
});
