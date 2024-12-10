function scrollWindow() {
    document.getElementById('why-choose-us').scrollIntoView({
        behavior: 'smooth'
    });
}

function calculateDelivery() {
    const cep = document.getElementById("cep").value;

    fetch(`<?php echo BASE_URL; ?>checkout/delivery?cep=${cep}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById("deliveryResult").innerText = `Frete: R$ ${data.freightCost}`;
            } else {
                document.getElementById("freightResult").innerText = data.message;
            }
        })
        .catch(error => console.error("Erro ao calcular o frete:", error));
}


function addQuantity() {

}