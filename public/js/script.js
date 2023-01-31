document.addEventListener('DOMContentLoaded', function() {
    let deleteModal = document.querySelector('#delete-modal') && document.querySelector('#delete-modal');
    let confirmDeleteBtn = document.querySelector('.confirm-delete') && document.querySelector('.confirm-delete');
    let cancelDeleteBtn = document.querySelector('.cancel-delete') && document.querySelector('.cancel-delete');
    let closeDeleteModal = document.querySelector('.close') && document.querySelector('.close');
    document.querySelectorAll('.icon.delete').forEach((item)=>{
        item.addEventListener('click',function(){
            let filmId = this.getAttribute('data-id');
            deleteModal.style.display = 'block';
            confirmDeleteBtn.addEventListener('click', function() {
                console.log('Delete film with ID: ' + filmId);
                fetch('/admin/films/delete/' + filmId, {method: 'GET'})
                .then(response => {
                    document.querySelector('div.movie-card[data-id="' + filmId + '"]').remove();
                    deleteModal.style.display = 'none';
                })
                .catch(error => {
                  console.log('Une erreur est survenue lors de la suppression: ' + error)
                });
            });
            cancelDeleteBtn.addEventListener('click', function() {
                deleteModal.style.display = 'none';
            });
            closeDeleteModal.addEventListener('click', function() {
                deleteModal.style.display = 'none';
            });
        })
    });

    if(document.getElementById('updateFilm')){
        //on récupère le nombre d'acteurs
        let nbActors = Number(document.getElementById('nbActors').value);
        let actorsContainer = document.querySelector('.actors-container');
        if(document.getElementById('actor1character')){
            if( document.getElementById('actor1character').value !== ''){
                let actorsSelect = document.getElementById('actor1').cloneNode(true);
                console.log(Number(nbActors + 1));
                actorsSelect.setAttribute('name', 'actor'+Number(nbActors + 1));
                actorsSelect.setAttribute('id', 'actor'+Number(nbActors + 1));
                let actorsCharacter = document.createElement('input');
                actorsCharacter.setAttribute('type', 'text');
                actorsCharacter.setAttribute('id', 'actor'+Number(nbActors + 1)+'character');
                actorsCharacter.setAttribute('name', 'actor'+Number(nbActors + 1)+'character');
                actorsCharacter.setAttribute('placeholder', 'Personnage joué...');
                let div = document.createElement('div');
                div.classList.add('actors-line');
                div.appendChild(actorsSelect);
                div.appendChild(actorsCharacter);
                actorsContainer.appendChild(div);
                document.getElementById('nbActors').value = Number(nbActors + 1);
                nbActors = Number(nbActors + 1);
            }
        }


        document.addEventListener('keyup', function (e) {
            if (e.target.matches('.actors-line input')) {
                if(document.getElementById('actor'+Number(nbActors)+'character').value !== ''){
                    let actorsSelect = document.getElementById('actor1').cloneNode(true);
                    console.log(Number(nbActors + 1));
                    actorsSelect.setAttribute('name', 'actor'+Number(nbActors + 1));
                    actorsSelect.setAttribute('id', 'actor'+Number(nbActors + 1));
                    let actorsCharacter = document.createElement('input');
                    actorsCharacter.setAttribute('type', 'text');
                    actorsCharacter.setAttribute('id', 'actor'+Number(nbActors + 1)+'character');
                    actorsCharacter.setAttribute('name', 'actor'+Number(nbActors + 1)+'character');
                    actorsCharacter.setAttribute('placeholder', 'Personnage joué...');
                    let div = document.createElement('div');
                    div.classList.add('actors-line');
                    div.appendChild(actorsSelect);
                    div.appendChild(actorsCharacter);
                    actorsContainer.appendChild(div);
                    document.getElementById('nbActors').value = Number(nbActors + 1);
                    nbActors = Number(nbActors + 1);
                }

            }
        });

        document.querySelectorAll('.delete-gallery-image').forEach((item)=>{
            item.addEventListener('click',function(e){
                console.log(this.getAttribute('data-id'), this.getAttribute('data-idfilm'));
                let idFilm = this.getAttribute('data-idfilm');
                let idImage = this.getAttribute('data-id');
                let removeImages = document.getElementById('removeImages');
                removeImages.value = removeImages.value + idImage + ',';
                console.log(removeImages.value);
                document.querySelector('div.gallery-line[data-id="' + idImage + '"]').remove();
            });
        });
    }
    if(document.getElementById('galleryAdmin')){
        document.querySelectorAll('.gallery-delete').forEach((item)=>{
            item.addEventListener('click',function(e){
                console.log(this.getAttribute('data-id'));
                let idImage = this.getAttribute('data-id');
                fetch('/admin/galerie/delete/' + idImage, {method: 'GET'})
                    .then(response => {
                        document.querySelector('div.gallery-line[data-id="' + idImage + '"]').remove();
                    });
            });
        });
    }
    if(document.getElementById('megamenu-mobile')){
        document.getElementById('megamenu-mobile').addEventListener('click',function(){
            document.querySelector('.navbar-toggle').classList.toggle('collapsed');

            if (document.querySelector('.navbar-toggle').classList.contains('collapsed')) {
                document.querySelector('body').style.overflow = 'auto';
                document.querySelector('.header--content').classList.remove('reponsive-menue');
            } else {
                document.querySelector('.header--content').classList.add('reponsive-menue');
                setTimeout(function(){
                    document.querySelector('body').style.overflow = 'hidden';
                }, 300);
            }
        });
    }
});
