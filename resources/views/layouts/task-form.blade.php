<div id="taskForm" class="modal">
    <form class="modal-content animate px-4 py-3" action="{{ route('createTask') }}" method="post">
        @csrf
        <input type="hidden" name="parent_id" id="parent_id" value="0">
        <input type="hidden" name="is_archive" id="is_archive" value="0">
        <div class="form-group">
            <input type="text" class="form-control my-2 border-0" style="height: 30px" placeholder="Task name" name="name" required autocomplete="off">
            <input type="text" class="form-control my-2 border-0" style="height: 20px" placeholder="Description" name="description" autocomplete="off">
        </div>
        <div class="form-group mb-0">
            <hr>
            <button type="submit" class="btn btn-danger btn-sm float-right ml-2">Add task</button>
            <button type="button" class="btn btn-sm float-right" onclick="document.getElementById('taskForm').style.display='none'">Cancel</button>
        </div>

        <!-- show errors if exists -->
        @error('task')
        @php
            alert('', "$message", 'error');
        @endphp
        @enderror

        @error('description')
        @php
            alert('', "$message", 'error');
        @endphp
        @enderror

        @error('parent_id')
        @php
            alert('', "$message", 'error');
        @endphp
        @enderror

        @error('is_archive')
        @php
            alert('', "$message", 'error');
        @endphp
        @enderror

    </form>
</div>
