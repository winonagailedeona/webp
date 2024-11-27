    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('add.about') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

      <script>
          document.addEventListener("DOMContentLoaded", () => {
              const addForm = document.getElementById("addForm");
              const dataTable = document.getElementById("dataTable");

              addForm.addEventListener("submit", function(e) {
                  e.preventDefault();

                  // Collect data from the form
                  const title = document.getElementById("addTitle").value;
                  const description = document.getElementById("addDescription").value;
                  const content = document.getElementById("addContent").value;
                  const timeUpdated = new Date().toISOString().slice(0, 19).replace("T", " ");

                  // Optionally, send data to the server
                  console.log({
                      title,
                      description,
                      content
                  }); // Replace with an actual AJAX or Fetch API call

                  // Add a new row to the table
                  const newRow = document.createElement("tr");
                  newRow.innerHTML = `
            <td>${title}</td>
            <td>${description}</td>
            <td>${content}</td>
            <td>${timeUpdated}</td>
          `;
                  dataTable.appendChild(newRow);

                  // Reset form fields
                  addForm.reset();

                  // Close the modal
                  const addModal = bootstrap.Modal.getInstance(document.getElementById("addModal"));
                  addModal.hide();
              });
          });
      </script>
