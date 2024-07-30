
const tipeReport = document.querySelector('#tipeReport')
// console.log(tipeReport)
const date = document.querySelector('#date')
const distrito = document.querySelector('#distrito') 
const secure = document.querySelector('#secure')

const buscar = document.querySelector('#buscar')
const download = document.querySelector('#download')
const graf = document.querySelector('#graf')
const graf2 = document.querySelector('#graf2')

let urlBase = 'http://localhost'

buscar.addEventListener('click', search)

tipeReport.addEventListener('change', changeValue)
function changeValue(){
    switch (tipeReport.value) {
        case 'all':
            hideAll()
            break;
        case 'date':
            hideAll()
            date.classList.add('show')
            break;
        case 'distrito':
            hideAll()
            distrito.classList.add('show')
            break;
        case 'secure':
            hideAll()
            secure.classList.add('show')
            break;
        default:
            break;
    }
}

function hideAll(){
    date.classList.remove('show')
    distrito.classList.remove('show')
    secure.classList.remove('show')
}

function search(){
    const value = tipeReport.value

    let url = urlBase+'/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/listFilter.php'
    let urlPdf = urlBase+'/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/report.php'
    let urlGraf = urlBase+'/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel.php'
    let urlGraf2 = urlBase+'/Salud_Mental_Tayacaja/Salud_Mental_T/modelo/grafic/pastel2.php'

    switch (value) {
        case 'all':
            url += '?v=1';
            download.href = urlPdf
            graf.src = urlGraf
            graf2.src = urlGraf2
            break;
        case 'date':
            const dateIni = document.querySelector('#dateIni').value;
            const dateFin = document.querySelector('#dateFin').value;
            url += '?v=1&type=date&dateIni='+dateIni+'&dateFin='+dateFin;
            download.href = urlPdf+'?type=date&dateIni='+dateIni+'&dateFin='+dateFin
            graf.src = urlGraf+'?type=date&dateIni='+dateIni+'&dateFin='+dateFin
            graf2.src = urlGraf2+'?type=date&dateIni='+dateIni+'&dateFin='+dateFin
            break;
        case 'distrito':
            const dist = document.querySelector('#dist').value
            url += '?v=1&type=distrito&dist='+dist;
            download.href = urlPdf+'?type=distrito&dist='+dist
            graf.src = urlGraf+'?type=distrito&dist='+dist
            graf2.src = urlGraf2+'?type=distrito&dist='+dist
            break;
        case 'secure':
            const sec = document.querySelector('#sec').value
            url += '?v=1&type=secure&sec='+sec;
            download.href = urlPdf+'?type=secure&sec='+sec
            graf.src = urlGraf+'?type=secure&sec='+sec
            graf2.src = urlGraf2+'?type=secure&sec='+sec
            break;
        default:
            break;
    }

    if (url) {
        
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                renderResults(data)
            })
            .catch(error => {
                console.error('Error:', error)
            })
    }
}

function renderResults(data){
    const results = document.querySelector("#data")
    results.innerHTML = '';
    if (Array.isArray(data)) {
        data.forEach(item => {
            const tr = document.createElement('tr')

            const td1 = document.createElement('td')
            td1.textContent = item.nombre+' '+item.apellido_paterno+' '+item.apellido_materno
            tr.appendChild(td1)

            const td6 = document.createElement('td')
            td6.textContent = item.fecha
            tr.appendChild(td6)

            const td2 = document.createElement('td')
            td2.textContent = item.numero_de_documento
            tr.appendChild(td2)

            const td3 = document.createElement('td')
            td3.textContent = item.telefono
            tr.appendChild(td3)

            const td4 = document.createElement('td')
            td4.textContent = item.distrito
            tr.appendChild(td4)

            const td5 = document.createElement('td')
            td5.textContent = item.tipo_de_seguro
            tr.appendChild(td5)

            results.appendChild(tr)
        })
    }
}
// search();