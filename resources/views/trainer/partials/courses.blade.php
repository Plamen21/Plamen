<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px">
    <div style="display: flex; align-items: center;">
        <div style="margin-right: 10px;">
            <label for="courses">Courses:</label>
            <select name="courses" id="courses" style="width: 200px;">
                <option value=""> Select Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-right: 10px;">
            <label for="modules">Modules:</label>
            <select name="modules" id="modules" style="width: 200px;">
                <option value="">Select module</option>
            </select>
        </div>
    </div>
    <div style="display: flex; align-items: center;">
        <div style="margin-right: 10px;">
            <label for="lectures">Lectures:</label>
            <select name="lectures" id="lectures" style="width: 200px;text-align: left;">
                <option value="">Select lecture</option>
            </select>
        </div>
        <div style="text-align: right; font-size: 12px;">
            <span id="scheduleDate">-</span>
            <br>
            Schedule date
        </div>
    </div>
</div>
