@extends('layouts.main')
@section('title', 'Create Post')

@section('content')
<script src="https://cdn.tiny.cloud/1/nm7d9yzl5cww8btcie73ml75ggzmk3b8mq4ux593831qmegk/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea', // Use textareas as the editor
        plugins: 'link image code', // Include the desired plugins
        toolbar: 'undo redo | bold italic | link image | code', // Customize the toolbar
        menubar: false, // Disable the menubar
    });
</script>
<div class="container m-10">
    <h1 class="text-slate-300 text-center text-5xl">Create a New Blog Post</h1>
    <form action="{{route('store-post')}}" method="POST" enctype="multipart/form-data" id="postForm">
        @csrf
        <div class="form-group">
            <label for="title" class="text-slate-300 text-2xl pr-5">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group mt-10">
            <label for="content" class="text-slate-300 text-2xl pr-5">Content</label>
            <textarea name="content" id="content" rows="25"></textarea>
        </div>
        <div class="form-group">
            <label for="images" class="text-slate-300 text-2xl pr-5">Upload Images</label>
            <input type="file" name="images[]" id="imgInp" multiple class="text-slate-300 text-2xl pr-5" />

            <div id="imagePreview" class="flex flex-wrap mt-4"></div>

        </div>
        <div class="form-group mt-10">
            <label for="images" class="text-slate-300 text-2xl pr-5">Upload Thumbnail</label>
            <input type="file" class="text-slate-300 text-2xl pr-5" name="thumbnail" id="thumbnail">
        </div>
        <button type="submit"
            class="text-white mt-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
            Post</button>
    </form>
</div>
<script>
    const selectedImages = [];

    imgInp.onchange = evt => {
        const files = imgInp.files;
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = '';

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const imgContainer = document.createElement('div');
            imgContainer.classList.add('mr-4', 'mb-4');
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.width = 200;
            img.height = 200;

            const deleteButton = document.createElement('button');
            deleteButton.innerText = 'X';
            deleteButton.classList.add('bg-red-500', 'text-white', 'px-2', 'py-1', 'rounded', 'cursor-pointer');

            // Add an event listener to delete the image and remove it from the selectedImages array
            deleteButton.addEventListener('click', () => {
                imgContainer.remove();
                const index = selectedImages.indexOf(file);
                if (index !== -1) {
                    selectedImages.splice(index, 1);
                }
            });

            imgContainer.appendChild(img);
            imgContainer.appendChild(deleteButton);
            imagePreview.appendChild(imgContainer);
            selectedImages.push(file);
        }
    }

    // Add an event listener to the form to update the FormData object before submission
    const form = document.getElementById('postForm');
    form.addEventListener('submit', () => {
        const formData = new FormData(form);
        // Remove any deleted images from the FormData
        for (const file of selectedImages) {
            formData.append('images[]', file);
        }
    });
</script>
@endsection