function setupDeleteModal(deleteFile) {
    let deleteId = 0;

    // Attach event listener to all delete buttons
    document
        .querySelectorAll('[data-bs-target="#modalDelete"]')
        .forEach(function (button) {
        button.addEventListener("click", function () {
            deleteId = this.getAttribute("data-id");
            console.log("Delete ID:", deleteId);

            // Set modal hidden input and label
            const deleteInput = document.getElementById("delete_id");
            const deleteCode = document.getElementById("delete_code");

            if (deleteInput && deleteCode) {
            deleteInput.value = deleteId;
            deleteCode.textContent = deleteId;
            }
        });
        });

    // Handle confirm delete
    const confirmBtn = document.getElementById("confirmDeleteBtn");
    if (confirmBtn) {
        confirmBtn.addEventListener("click", function () {
        const formData = new FormData();
        formData.append("delete", true);
        formData.append("id", deleteId);

        fetch("../function/" + deleteFile, {
            method: "POST",
            body: formData,
        })
            .then(res => res.text())
            .then(text => {
                // console.log("Raw response:", text); // Debug this
                let response;
                
                try {
                    response = JSON.parse(text);
                } catch (e) {
                    console.error("JSON parse error:", e);
                    Swal.fire("Error", "Invalid server response", "error");
                    return;
                }

                if (response.status === "success") {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    }).then(() => location.reload());
                } else {
                    Swal.fire("Delete failed", response.message || "No error message", "error");
                }
            })
            .catch((error) => {
                console.error("Fetch failed:", error);
                Swal.fire("Error", "An unexpected error occurred.", "error");
            });
        });
    }
}
