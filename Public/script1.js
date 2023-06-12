const niveau = document.querySelector('#select-niveau')
const Selectclasse = document.querySelector('#select-classes')
const selectgroupe = document.querySelector('#select-groupe')
const disciplinescontainer = document.querySelector('#disciplines-container')



niveau.addEventListener("change", () => {
    if (niveau.value == 0) {
        Selectclasse.innerHTML = ''
        selectgroupe.innerHTML = ''
    }else{
        Ffetch()
        Disciplinefetch();
    }
});

function Ffetch() {
    fetch(`http://localhost:8080/Discipline/chargerClasses`)
        .then(response => response.json())
        .then(data => {
            Selectclasse.innerHTML = ''
            const option = creatingElement('option');
            option.innerHTML = "Selectionner une classe";
            option.Value = "#";
            Selectclasse.appendChild(option);

            data.forEach((id) => {
                const {
                    nom,
                    id_groupeNIveau,
                    id_classe
                } = id
                if (niveau.value == id_groupeNIveau) {
                    const option = creatingElement('option');
                    option.innerHTML = nom;
                    option.value = id_classe;
                    Selectclasse.appendChild(option);
                }
            })
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
        })
}

function creatingElement(elName) {
    return document.createElement(elName);
}






function Disciplinefetch() {
    fetch(`http://localhost:8080/Discipline/chargerDiscipline`)
        .then(response => response.json())
        .then(data => {
            selectgroupe.innerHTML = ''
            const option = creatingElement('option');
            option.innerHTML = "Selectionner un Groupe de Niveau";
            option.value = "#";
            selectgroupe.appendChild(option);

            const nouveau = creatingElement('option');
            nouveau.innerHTML = "nouveau";
            nouveau.value = "0";
            selectgroupe.appendChild(nouveau);
            data.forEach((id) => {
                const {
                    libelle,
                    id_groupeDiscipline
                } = id
                const option = creatingElement('option');
                option.innerHTML = libelle;
                option.value = id_groupeDiscipline;
                selectgroupe.appendChild(option);
            })
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
        })
}





Selectclasse.addEventListener("change", () => {
    // console.log(Selectclasse.value);
    Disciplinesfetch()
})



function Disciplinesfetch() {
    fetch(`http://localhost:8080/Discipline/chargementDiscipline`)
        .then(response => response.json())
        .then(data => {
            disciplinescontainer.textContent = ''
            data.forEach((id) => {
                const {
                    libelle,
                    code,
                    id_classe,
                    id_discipline
                } = id
                if (Selectclasse.value == id_classe) {
                    const div = creatingElement('div');
                    div.classename = "form-check";
                    div.innerHTML = `<input class="form-check-input check" type="checkbox" code="${id_discipline}" value="" id="flexCheckDefault" checked>
                <label class="form-check-label label" for="flexCheckDefault">
                    ${libelle} (${code})
                </label>`
                    disciplinescontainer.appendChild(div);
                }
            })
            const checkboxes = document.querySelectorAll('.check');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const label = checkbox.nextElementSibling;
                    if (checkbox.checked) {
                        label.style.color = '';
                        label.style.fontWeight = '';
                    } else {
                        label.style.color = 'red';
                        label.style.fontWeight = 'Bold';
                    }
                });
            });
        })
}


const Ok_boutton = document.querySelector('.Ok_boutton');
const discipline = document.querySelector('.discipline');


function getCode(discipline) {
    const mot = discipline.split(" ");
    if (mot.length === 1) {
        const code = mot[0].substring(0, 3).toUpperCase();
        return code;
    } else {
        const code = mot.map(word => word.charAt(0).toUpperCase()).join("");
        return code;
    }
}




Ok_boutton.addEventListener('click', () => {
    const inputVal = discipline.value;
    const selectedClasse = Selectclasse.value;
    const selectedGroupe = selectgroupe.value;


    const code = getCode(inputVal);

    if (inputVal && selectedClasse && selectedGroupe) {
        const data = {
            discipline: {
                libelle: inputVal,
                id_groupeDiscipline: selectedGroupe,
                code: code
            },
            classe: {
                id_classe: selectedClasse
            }
        };

        fetch('http://localhost:8080/Discipline/AjoutDiscipline', {
            method: 'POST',
            body: JSON.stringify(data)
        })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
            });
    }

    discipline.value = ''
    Disciplinesfetch()
});





const mettreJour = document.querySelector('.mettreJour')

mettreJour.addEventListener('click', () => {
    const uncheckedCheckboxes = document.querySelectorAll('.check:not(:checked)');

    console.log(uncheckedCheckboxes);

    uncheckedCheckboxes.forEach(check => {
        const id_discipline = check.getAttribute('code');
        // console.log(code);
        const data = {
            id_discipline: id_discipline
        }
        console.log(data);
        fetch('http://localhost:8080/Discipline/suppression', {
            method: 'POST',
            body: JSON.stringify(data)
        })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
            });
    });
    Disciplinesfetch()

});


selectgroupe.addEventListener('change', () => {
    if (selectgroupe.value == 0) {
        const button = document.querySelector('[data-bs-target="#exampleModal"]');
        button.click();
    }
});


const insertdiscipline = document.querySelector('.insertdiscipline');
const saves = document.querySelector('.saves');

saves.addEventListener('click', () => {
    const groupediscipline = insertdiscipline.value

    if (groupediscipline) {
        const data = {
            libelle: groupediscipline
        }
        fetch('http://localhost:8080/Discipline/insertGroupeDiscipline', {
            method: 'POST',
            body: JSON.stringify(data)
        })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
            });
    }

    Disciplinefetch();

});














































// if (inputVal && selectedClasse && selectedGroupe) {
//     const data = {
//         libelle: inputVal,
//         id_groupeDiscipline: selectedGroupe,
//         id_classe: selectedClasse,
//         code: code
//     };
//     fetch('http://localhost:8080/Discipline/AjoutDiscipline', {
//         method: 'POST',
//         body: JSON.stringify(data)
//     })
//     console.log(data)
//     .then(response => response.json())
//     .then(result => {
//         console.log(result);
//         console.log(response);
//     })
//     .catch(error => {
//         console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
//     });
// }












// Ok_boutton.addEventListener('click', () => {
//     const inputVal = discipline.value;
//     const selectedClasse = Selectclasse.value;
//     const selectedGroupe = selectgroupe.value;

//     const code = getCode(inputVal);

//     // Vérification des valeurs sélectionnées
//     if (inputVal && selectedClasse && selectedGroupe) {
//         // Création de l'objet de données à envoyer
//         const data = {
//             libelle: inputVal,
//             id_discipline: selectedClasse,
//             id_groupeDiscipline: selectedGroupe,
//             code: code
//         };

//         // Envoi de la requête POST pour insérer la discipline
//         fetch('http://localhost:8080/Discipline/AjoutDiscipline', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data)
//         })
//             .then(response => response.json())
//             .then(result => {
//                 // Traitement de la réponse
//                 console.log(result);
//             })
//             .catch(error => {
//                 // Gestion des erreurs
//                 console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
//             });
//     }
// });





// let formData = new FormData();
// formData.append('key1', 'value1');
// formData.append('key2', 'value2');










// const data = {
//     value: inputVal
// };

// fetch('http://localhost:8080/Discipline/AjoutDiscipline', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(data)
// })
// .then(response => {
//     if (response.ok) {
//         console.log('Données envoyées avec succès');
//     } else {
//         console.error('Erreur lors de l\'envoi des données');
//     }
// })
// .catch(error => {
//     console.error('Une erreur s\'est produite:', error);
// });












// function chargerSelect(data, select, label = 'Selectionner') {
    //     select.innerHTML = '';
    //     const option = creatingElement('option');
    //     option.innerHTML = label;
    //     select.appendChild(option);
    //     data.forEach(d => {
        //         const option = creatingElement('option');
        //         option.innerHTML = d.nom;
        //         select.appendChild(option);
        //     });
        // }