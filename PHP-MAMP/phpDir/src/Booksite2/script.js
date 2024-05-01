/**
 * Toggles the edit mode on a table row.
 *
 * @param {HTMLElement} row - The table row element.
 * @param {boolean} isEditing - A flag indicating whether to switch to edit mode.
 */
function toggleEditMode(row, isEditing) {
  // Retrieve the cells for title, password, and actions from the row
  const titleCell = row.children[1];
  const authorCell = row.children[2];
  const publishing_yearCell = row.children[3];
  const genreCell = row.children[4];
  const descriptionCell = row.children[5];
  const actionsCell = row.children[6];
  const editButton = actionsCell.children[0];
  const deleteButton = actionsCell.children[1];

  if (isEditing) {
    // Switch to edit mode: display input fields
    titleCell.innerHTML = `<input type="text" value="${titleCell.textContent}">`;
    authorCell.innerHTML = `<input type="text" value="${authorCell.textContent}">`;
    publishing_yearCell.innerHTML = `<input type="number" value="${publishing_yearCell.value}">`;
    genreCell.innerHTML = `<input type="text" value="${genreCell.textContent}">`;
    descriptionCell.innerHTML = `<input type="text" value="${descriptionCell.textContent}">`;

    // Change button labels to 'Save' and 'Cancel'
    editButton.textContent = "Save";
    deleteButton.textContent = "Cancel";
    // Set onclick handlers for saving changes and cancelling edit
    deleteButton.setAttribute(
      "onclick",
      "toggleEditMode(this.parentNode.parentNode, false)"
    );
    editButton.setAttribute(
      "onclick",
      "submitEdit(this.parentNode.parentNode)"
    );
  } else {
    // Revert to read mode: display text
    titleCell.textContent = titleCell.querySelector("input").value;
    authorCell.textContent = authorCell.querySelector("input").value;
    publishing_yearCell.textContent =
      publishing_yearCell.querySelector("input").value;
    genreCell.textContent = genreCell.querySelector("input").value;
    descriptionCell.textContent = descriptionCell.querySelector("input").value;
    editButton.textContent = "Edit";
    deleteButton.textContent = "Delete";
    deleteButton.setAttribute(
      "onclick",
      `deleteRow(${row.getAttribute("data-id")})`
    );
    editButton.setAttribute(
      "onclick",
      "toggleEditMode(this.parentNode.parentNode, true)"
    );
  }
}

/**
 * Deletes a table row after confirmation.
 *
 * @param {number} id - The ID of the user to delete.
 */
function deleteRow(id) {
  if (confirm("Are you sure you want to delete?")) {
    const form = createForm("delete_id", id);
    document.body.appendChild(form);
    form.submit();
  }
}

/**
 * Submits the edited data for a table row.
 *
 * @param {HTMLElement} row - The table row element.
 */
function submitEdit(row) {
  const id = row.getAttribute("data-id");
  const title = row.children[1].querySelector("input").value;
  const author = row.children[2].querySelector("input").value;
  const publishing_year = row.children[3].querySelector("input").value;
  const genre = row.children[4].querySelector("input").value;
  const description = row.children[5].querySelector("input").value;

  const form = createForm("edit_id", id);
  form.appendChild(createInput("edit_title", title));
  form.appendChild(createInput("edit_author", author));
  form.appendChild(createInput("edit_publishing_year", publishing_year));
  form.appendChild(createInput("edit_genre", genre));
  form.appendChild(createInput("edit_description", description));
  document.body.appendChild(form);
  form.submit();
}

/**
 * Creates a form element with a specified name and value.
 *
 * @param {string} name - The name attribute for the form's input element.
 * @param {string} value - The value attribute for the form's input element.
 * @returns {HTMLFormElement} The created form element.
 */
function createForm(name, value) {
  const form = document.createElement("form");
  form.method = "post";
  form.style.display = "none";
  form.appendChild(createInput(name, value));
  return form;
}

/**
 * Creates an input element with a specified name and value.
 *
 * @param {string} name - The name attribute for the input element.
 * @param {string} value - The value attribute for the input element.
 * @returns {HTMLInputElement} The created input element.
 */
function createInput(name, value) {
  const input = document.createElement("input");
  input.type = "hidden";
  input.name = name;
  input.value = value;
  return input;
}
