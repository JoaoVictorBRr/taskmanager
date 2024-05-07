const optionDiv = document.querySelector('.option-div');

function openMenu(){

    if(optionDiv.style.display == 'none'){
        optionDiv.style.display = 'flex';

    }else{
        optionDiv.style.display = 'none';
    }
    
}