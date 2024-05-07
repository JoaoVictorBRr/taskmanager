
function createCssTask(TaskClass) {
  TaskClass.style.transition = "0.4s";
  TaskClass.style.fontFamily = "Inter";
  TaskClass.style.backgroundColor = "#EFEFEF";
  TaskClass.style.height = "100vh";
  TaskClass.style.position = "fixed";
  TaskClass.style.zIndex = "9999";
  TaskClass.style.top = "0px";
  TaskClass.style.right = "-80rem";

}

function openTask(id) {
  const taskOpen = document.querySelector(`.task-container-open-${id}`);
  createCssTask(taskOpen);
  taskOpen.style.right = "0px"
  taskOpen.style.display = "block";
  document.querySelector('.overlay').style.display = 'block';
 
  
}

function closeTask(id){
    const taskOpen = document.querySelector(`.task-container-open-${id}`);
    taskOpen.style.right = "-80rem" 
    document.querySelector("#overlay").style.display = "none";
}