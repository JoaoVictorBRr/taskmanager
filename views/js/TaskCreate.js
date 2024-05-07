const ContainerCreateTask = document.querySelector(".createTaskContainer");
const overlay = document.querySelector(".overlay");
const divFluxo = document.querySelector(".ContainerFluxo");
const divZero = document.querySelector(".divZero");
const divExecutor = document.querySelector(".divExecutor");

function openTaskCreate() {

  overlay.style.display = "flex";
  ContainerCreateTask.style.display = "flex";
  
  divZero.style.display = "block";
  divFluxo.style.display = "none";

}

function nextTaskCreate() {

  divZero.style.display = "none";
  divFluxo.style.display = "block";

 
}

function closeTaskCreate() {
  
  overlay.style.display = "none";
  ContainerCreateTask.style.display = "none";

}

function backTaskCreate() {

  divZero.style.display = "block";
  divFluxo.style.display = "none";

}

