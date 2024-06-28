// import AppForm from '../app-components/Form/AppForm';

export async function buscarInformacoes(cep) {
    return await fetch('https://api.brasilaberto.com/v1/zipcode/' + cep)
        .then(response => response.json())
        .then(data => {
            if (data.result.error) {
                console.error('Ocorreu um erro: ', data.result.message);
                return null;
            }
            return {
                'logradouro': data.result.street,
                'bairro': data.result.district,
                'cidade': data.result.city,
                'estado': data.result.state,
                'pais': "Brasil"
            }
        })
        .catch(error => {
            console.error('Ocorreu um erro de requisição: ', error);
            return null;
        });
}
