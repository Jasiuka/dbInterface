document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-btn");

  // DELETE FUNCTIONALITY
  deleteButtons.forEach((button) =>
    button.addEventListener("click", () => {
      const id = button.getAttribute("data-id");
      const tableName = button.getAttribute("data-table");

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "istrinti.php");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        // Refresh the page or update the table with the new data to reflect the deletion
        location.reload();
      };
      xhr.send("id=" + id + "&table=" + tableName);
    })
  );
});
