const supprimer = document.querySelectorAll('.supprimer');



supprimer.forEach((element) => {
    element.addEventListener('click', () => {
        const id_discipline = element.getAttribute('data-id-discipline');
        console.log(id_discipline);
        const data = {
            id_discipline: id_discipline
        }
        fetch('http://localhost:8080/Room/suppression', {
            method: 'POST',
            body: JSON.stringify(data)
        })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de l\'insertion de la discipline:', error);
            });
        window.location.reload();
    })
});





const mettreAJourBtn = document.querySelector('.mettre-a-jour');

const inputs = document.querySelectorAll('.Modif');
const updatedData = [];
inputs.forEach((input) => {
    input.addEventListener('change', () => {
        input.classList.add('changed');
        // if (input.classList.contains('ressource')) {
        //     const ressource = input.value
        //     if (ressource <= 9) {
        //         input.style.backgroundColor = "red";
        //     } else {
        //         input.style.backgroundColor = "green";
        //         updatedData.push({
        //             id_discipline: id_discipline,
        //             ressource: ressource,
        //         });
        //     }
        // }
        // if (input.classList.contains('examen')) {
        //     const examen = input.value
        //     if (examen <= 9) {
        //         input.style.backgroundColor = "red";
        //     } else {
        //         input.style.backgroundColor = "green";
        //         updatedData.push({
        //             id_discipline: id_discipline,
        //             examen: examen,
        //         });
        //     }
        // }

    })

});
mettreAJourBtn.addEventListener('click', () => {
    const changed = document.querySelectorAll('.changed');
    const updatedData = [];
    changed.forEach((input) => {
        const id_disciplineDirection = input.getAttribute('data');
        const Direction =id_disciplineDirection.split('_')
        const id_discipline = Direction[0]
        const direction = Direction[1]
        const valeur = input.value
        updatedData.push({
            id_discipline: id_discipline,
            valeur: valeur,
            direction: direction
        });
    })
    if (updatedData.length > 0) {
        const data = {
            updatedData: updatedData
        };
        console.log(data);
        fetch('http://localhost:8080/Room/miseAjour', {
            method: 'POST',
            body: JSON.stringify(data)
        })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de la mise à jour:', error);
            });
    } else {
        alert('Aucune Modification est faite lors de la mise à jour');
    }

});






// const mettreAJourBtn = document.querySelector('.mettre-a-jour');

// mettreAJourBtn.addEventListener('click', () => {
//     const inputs = document.querySelectorAll('.Modif');
//     const updatedData = [];

//     inputs.forEach((input, index) => {
//         if (input.classList.contains('ressource')) {
//             const id_discipline = input.getAttribute('data-id-discipline');
//             const ressource = input.value;
//             // console.log(ressource);
//             // console.log(id_discipline);


//             if (ressource>=10) {
//                 input.style.color ="White";
//                 input.style.backgroundColor ="green";
//             }else{
//                 input.style.backgroundColor ="red";
//                 input.style.color ="White";
//             }
//             const examenInput = inputs[index + 1];
//             const examen = examenInput ? examenInput.value : '';
//             // console.log(examen);
//             if (examen>9) {
//                 examenInput.style.backgroundColor ="green";
//                 examenInput.style.color ="white";
//             }else{
//                 examenInput.style.backgroundColor ="red";
//                 examenInput.style.color ="white";
//             }

//             updatedData.push({
//                 id_discipline: id_discipline,
//                 ressource: ressource,
//                 examen: examen
//             });

//         }
//     });

//     const data = {
//         updatedData: updatedData
//     };
//     console.log(data);

//     fetch('http://localhost:8080/Room/miseAjour', {
//         method: 'POST',
//         body: JSON.stringify(data)
//     })
//         .catch(error => {
//             console.error('Une erreur s\'est produite lors de la mise à jour:', error);
//         });
// });