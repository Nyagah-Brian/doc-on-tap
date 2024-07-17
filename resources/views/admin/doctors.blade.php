@extends('layouts.admin.index')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ul>
                    </div>

                    <div class="page-btn">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-ideas-fest-faq"><i
                                data-feather="plus-circle" class="me-2"></i> Add New Doctor</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Speciality</th>
                                            <th>License Number</th>
                                            <th>Years of Experience</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</td>
                                                <td>{{ $doctor->speciality->name }}</td>
                                                <td>{{ $doctor->license_number }}</td>
                                                <td>{{ $doctor->years_of_experience }}</td>
                                                <td>
                                                    {{-- Add your action buttons/links here (e.g., View, Edit, Delete) --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="add-ideas-fest-faq">
    <div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add New Doctor</h4>
                        </div>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">

                        <form action="#" id="create_doctor_form">


                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" placeholder="Enter First Name" id="first_name" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" placeholder="Enter Last Name" id="last_name" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" placeholder="Enter Email" id="email" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" placeholder="Enter Phone Number" id="phone_number" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" placeholder="Enter Address" id="address" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Birth Date <span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" placeholder="Enter Birth Date" id="birth_date" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Speciality <span class="text-danger">*</span></label>
                                        <select name="speciality_id" id="speciality_id" class="form-control">
                                           
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">License Number <span class="text-danger">*</span></label>
                                        <input type="text" name="license_number" placeholder="Enter License Number" id="license_number" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Years of Experience <span class="text-danger">*</span></label>
                                        <input type="number" name="years_of_experience" placeholder="Enter Years of Experience" id="years_of_experience" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" placeholder="Enter Password" id="password" class="form-control" />
                                    </div>
                                </div>
                            
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="mb-3 add-field">
                                        <label class="form-label d-block">Status <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-md form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="active" value="active">
                                            <label class="form-check-label text-dark" for="active">Active</label>
                                        </div>
                                        <div class="form-check form-check-md form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                                            <label class="form-check-label text-dark" for="inactive">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-danger btn-cancel me-2">Cancel</button>
                                <button type="submit" class="btn btn-success btn-submit">
                                    <span class="indicator-label">Add New Doctor</span>
                                    <span class="indicator-progress" style="display: none;">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalElement = document.getElementById("add-ideas-fest-faq");
            const formElement = document.getElementById("create_doctor_form");
            const submitButton = formElement.querySelector(".btn-submit");
            const indicatorLabel = submitButton.querySelector(".indicator-label");
            const indicatorProgress = submitButton.querySelector(".indicator-progress");

            const modal = new bootstrap.Modal(modalElement);

            // Initialize FormValidation
            const fv = FormValidation.formValidation(formElement, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "First Name is required",
                            },
                        },
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "Last Name is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".add-field",
                    }),
                },
            });

            // Handle form submission
            formElement.addEventListener("submit", function(event) {
                event.preventDefault();
                fv.validate().then(function(status) {
                    if (status === "Valid") {
                        showLoadingIndicator(true);

                        const formData = new FormData(formElement);
                        submitForm(formData)
                            .then(handleSuccess)
                            .catch(handleError)
                            .finally(() => showLoadingIndicator(false));
                    } else {
                        showError(
                            "Sorry, looks like there are some errors detected, please try again."
                        );
                    }
                });
            });

            // Show/hide loading indicator
            function showLoadingIndicator(show) {
                indicatorLabel.style.display = show ? "none" : "inline-block";
                indicatorProgress.style.display = show ? "inline-block" : "none";
                submitButton.disabled = show;
            }

            // Handle form submission success
            function handleSuccess(data) {
                Swal.fire({
                    text: data.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(() => {
                    modal.hide();
                    formElement.reset();
                    fv.resetForm(true);
                    location.reload(); // Refresh the page or update the UI accordingly
                });
            }

            // Handle form submission error
            function handleError(error) {
                const errorMessage =
                    error.message || "An error occurred while processing your request.";
                showError(errorMessage);
            }

            // Show error message using Swal
            function showError(message) {
                Swal.fire({
                    text: message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            }

            // Submit form via AJAX
            function submitForm(formData) {
                return fetch("/admin/doctors", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                        Accept: "application/json",
                    },
                    body: formData,
                }).then((response) => {
                    if (!response.ok) {
                        return response.json().then((errorData) => {
                            throw new Error(
                                errorData.message ||
                                "An error occurred while processing your request."
                            );
                        });
                    }
                    return response.json();
                });
            }

            // Handle modal close button
            modalElement
                .querySelector(".close")
                .addEventListener("click", handleModalClose);

            // Handle cancel button
            modalElement
                .querySelector(".btn-cancel")
                .addEventListener("click", handleModalCancel);

            // Handle modal close event
            function handleModalClose(event) {
                event.preventDefault();
                confirmAction("Are you sure you would like to close?", () => {
                    formElement.reset();
                    fv.resetForm(true);
                    modal.hide();
                });
            }

            // Handle modal cancel event
            function handleModalCancel(event) {
                event.preventDefault();
                confirmAction(
                    "Are you sure you would like to cancel?",
                    () => {
                        formElement.reset();
                        fv.resetForm(true);
                        modal.hide();
                    },
                    () => {
                        showError("Your form has not been cancelled!");
                    }
                );
            }

            // Show confirmation dialog
            function confirmAction(message, onConfirm, onCancel) {
                Swal.fire({
                    text: message,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, proceed!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then((result) => {
                    if (result.isConfirmed && onConfirm) {
                        onConfirm();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel &&
                        onCancel
                    ) {
                        onCancel();
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalElement = document.getElementById("edit-ideas-fest-faq");
            const formElement = document.getElementById("edit_ideas_fest_faq_form");
            const submitButton = formElement.querySelector(".btn-update");
            const indicatorLabel = submitButton.querySelector(".indicator-label");
            const indicatorProgress = submitButton.querySelector(".indicator-progress");

            const modal = new bootstrap.Modal(modalElement);

            // Initialize FormValidation
            const fv = FormValidation.formValidation(formElement, {
                fields: {
                    question: {
                        validators: {
                            notEmpty: {
                                message: "Question is required",
                            },
                        },
                    },
                    answer: {
                        validators: {
                            notEmpty: {
                                message: "Answer is required",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".add-field",
                    }),
                },
            });

            // Handle form submission
            formElement.addEventListener("submit", function(event) {
                event.preventDefault();
                fv.validate().then(function(status) {
                    if (status === "Valid") {
                        showLoadingIndicator(true);

                        const formData = new FormData(formElement);

                        submitForm(formData)
                            .then(handleSuccess)
                            .catch(handleError)
                            .finally(() => showLoadingIndicator(false));
                    } else {
                        showError(
                            "Sorry, looks like there are some errors detected, please try again."
                        );
                    }
                });
            });

            // Show/hide loading indicator
            function showLoadingIndicator(show) {
                indicatorLabel.style.display = show ? "none" : "inline-block";
                indicatorProgress.style.display = show ? "inline-block" : "none";
                submitButton.disabled = show;
            }

            // Handle form submission success
            function handleSuccess(data) {
                Swal.fire({
                    text: data.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(() => {
                    modal.hide();
                    formElement.reset();
                    fv.resetForm(true);
                    location.reload(); // Refresh the page or update the UI accordingly
                });
            }

            // Handle form submission error
            function handleError(error) {
                const errorMessage =
                    error.message || "An error occurred while processing your request.";
                showError(errorMessage);
            }

            // Show error message using Swal
            function showError(message) {
                Swal.fire({
                    text: message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            }

            // Submit form via AJAX
            function submitForm(formData) {
                const questionId = formData.get("faqId");

                return fetch(`/portal/ideas_fest/ideasfaq/${questionId}`, {
                    method: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                        Accept: "application/json",
                    },
                    body: new URLSearchParams(formData),
                }).then((response) => {
                    if (!response.ok) {
                        return response.json().then((errorData) => {
                            throw new Error(
                                errorData.message ||
                                "An error occurred while processing your request."
                            );
                        });
                    }
                    return response.json();
                });
            }

            // Handle modal close button
            modalElement
                .querySelector(".close")
                .addEventListener("click", handleModalClose);

            // Handle cancel button
            modalElement
                .querySelector(".btn-cancel")
                .addEventListener("click", handleModalCancel);

            // Handle modal close event
            function handleModalClose(event) {
                event.preventDefault();
                confirmAction("Are you sure you would like to close?", () => {
                    formElement.reset();
                    fv.resetForm(true);
                    modal.hide();
                });
            }

            // Handle modal cancel event
            function handleModalCancel(event) {
                event.preventDefault();
                confirmAction(
                    "Are you sure you would like to cancel?",
                    () => {
                        formElement.reset();
                        fv.resetForm(true);
                        modal.hide();
                    },
                    () => {
                        showError("Your form has not been cancelled!");
                    }
                );
            }

            // Show confirmation dialog
            function confirmAction(message, onConfirm, onCancel) {
                Swal.fire({
                    text: message,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, proceed!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then((result) => {
                    if (result.isConfirmed && onConfirm) {
                        onConfirm();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel &&
                        onCancel
                    ) {
                        onCancel();
                    }
                });
            }

            // Attach event listener to edit buttons
            document.querySelectorAll(".edit-faq-btn").forEach(function(button) {
                button.addEventListener("click", function(event) {
                    const questionId = button.getAttribute("data-question-id");
                    fetchQuestionData(questionId);
                });
            });

            // Fetch data and populate modal
            function fetchQuestionData(faqId) {
                fetch(`/portal/ideas_fest/ideasfaq/${faqId}`)
                    .then((response) => {
                        if (!response.ok) {
                            return response.json().then((errorData) => {
                                throw new Error(
                                    errorData.message ||
                                    "An error occurred while fetching question data."
                                );
                            });
                        }
                        return response.json();
                    })
                    .then((data) => {
                        // console.log(data);
                        populateEditModal(data);
                    })
                    .catch((error) => {
                        // console.log(error);
                        showError("An error occurred while fetching question data.");
                    });
            }

            // Populate the edit modal with fetched data
            function populateEditModal({
                ideasfaq
            }) {
                formElement.querySelector('input[name="faqId"]').value = ideasfaq.id;
                formElement.querySelector('input[name="question"]').value =
                    ideasfaq.question;
                formElement.querySelector('textarea[name="answer"]').value =
                    ideasfaq.answer;
                ideasfaq.is_published ?
                    (formElement.querySelector("#published").checked = true) :
                    (formElement.querySelector("#draft").checked = true);
                ideasfaq.is_answered ?
                    (formElement.querySelector("#answered").checked = true) :
                    (formElement.querySelector("#not_answered").checked = true);
            }
        });
    </script>
@endsection
