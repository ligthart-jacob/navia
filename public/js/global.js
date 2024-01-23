const _token = document.head.querySelector(`meta[name="_token"]`).content;

const _characters = JSON.parse(document.querySelector(`meta[name="_characters"]`).content);

for (const select of document.getElementsByClassName("custom-select"))
{
  const [input, head, list] = select.children;
  head.onclick = function(event)
  {
    event.stopPropagation();
    select.classList.contains("open") ? select.classList.remove("open") : select.classList.add("open");
  }
  head.innerText = list.children[0].innerText;
  input.value = list.children[0].dataset.value;
  for (const option of list.children)
  {
    if (option.dataset.hasOwnProperty("selected"))
    {
      head.innerText = option.innerText;
      input.value = option.dataset.value;
    }
    option.onclick = function(event)
    {
      event.stopPropagation();
      input.value = option.dataset.value;
      head.innerText = option.innerText;
      select.classList.remove("open")
    }
  }
}

document.onclick = function()
{
  for (const select of document.getElementsByClassName("custom-select"))
  {
    if (select.classList.contains("open")) select.classList.remove("open");
  }
}

function showEdit(event, idSelector, uuid)
{
  if (event.button == 4)
  {
    const character = _characters.filter(c => c.uuid == uuid)[0];
    const form = document.getElementById(idSelector);
    form.querySelector('input[name=name]').value = character.name;
    form.querySelector('input[name=image]').value = character.image;
    form.querySelector('input[name=currentImage]').value = character.image;
    form.querySelector('.custom-select > .head').innerText = character.series;
    form.querySelector('input[name=series]').value = character.slug;
    form.action = `/characters/${character.uuid}`;
    form.dataset.show = 1;
    document.getElementById("overlay").dataset.show = 1;
  }
}

function closeEdit(idSelector)
{
  document.getElementById(idSelector).dataset.show = 0;
  document.getElementById("overlay").dataset.show = 0;
}

