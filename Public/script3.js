const disciplineSelect = document.querySelector('.discipline');
const typeDeNote = document.querySelector('.noteDe');
const blocNoteCoef = document.querySelectorAll('.blocNote');
const updatedData = [];
let id_discipline;
let id_classe;

disciplineSelect.addEventListener('change', () => {
    const selectedOption = disciplineSelect.options[disciplineSelect.selectedIndex];
    id_classe = selectedOption.dataset.id_classe;
    id_discipline = disciplineSelect.value;
});

typeDeNote.addEventListener('change', () => {
    const typeNote = typeDeNote.value;
    updatedData.push({
        id_discipline: id_discipline,
    });
    const data = {
        updatedData: updatedData
    };
    fetch('http://localhost:8080/Note/getPonderation', {
        method: 'POST',
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            blocNoteCoef.forEach(element => {
                element.innerHTML = '';
                const input = document.createElement('input');
                input.type = 'number';
                input.classList.add('form-control', 'w-25');
                input.setAttribute('aria-label', 'Username');
                input.setAttribute('aria-describedby', 'basic-addon1');
                element.appendChild(input);
            });
            data.forEach((id) => {
                const { examen, ressource } = id;
                if (typeDeNote.value === 'examen') {
                    blocNoteCoef.forEach(element => {
                        const label = document.createElement('label');
                        label.textContent = `/${examen}`;
                        element.appendChild(label);
                    });
                }
                if (typeDeNote.value === 'ressource') {
                    blocNoteCoef.forEach(element => {
                        const label = document.createElement('label');
                        label.textContent = `/${ressource}`;
                        element.appendChild(label);
                    });
                }
            });
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors de la mise à jour:', error);
        });
});
