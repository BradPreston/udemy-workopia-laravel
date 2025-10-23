<x-layout>
    <x-slot name="title">Workopia - Create Job</x-slot>
    <div
        class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl"
    >
        <h2 class="text-4xl text-center font-bold mb-4">
            Create Job Listing
        </h2>
        <form
            method="POST"
            action="/jobs"
            enctype="multipart/form-data"
        >
            @csrf
            <h2
                class="text-2xl font-bold mb-6 text-center text-gray-500"
            >
                Job Info
            </h2>

            <x-inputs.text id="title" name="title" label="Job Title" placeholder="Software Engineer" />

            <x-inputs.text-area id="description" name="description" label="Description" placeholder="We are seeking a skilled and motivated Software Developer..." />

            <x-inputs.text id="salary" name="salary" label="Salary" type="number" placeholder="90000" />

            <x-inputs.text-area id="requirements" name="requirements" label="Requirements" placeholder="Bachelor's degree in Computer Science" />

            <x-inputs.text-area id="benefits" name="benefits" label="Benefits" placeholder="Health insurance, 401k, paid time off" />

            <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" placeholder="development, coding, java, python" />

            <div class="mb-4">
                <label class="block text-gray-700" for="job_type"
                    >Job Type</label
                >
                <select
                    id="job_type"
                    name="job_type"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('job_type') border-red-500 @enderror"
                >
                    <option value="Full-Time" {{old('job_type') == 'Full-Time' ? 'selected' : ''}}>
                        Full-Time
                    </option>
                    <option value="Part-Time" {{old('job_type') == 'Part-Time' ? 'selected' : ''}}>Part-Time</option>
                    <option value="Contract" {{old('job_type') == 'Contract' ? 'selected' : ''}}>Contract</option>
                    <option value="Temporary" {{old('job_type') == 'Temporary' ? 'selected' : ''}}>Temporary</option>
                    <option value="Internship" {{old('job_type') == 'Internship' ? 'selected' : ''}}>Internship</option>
                    <option value="Volunteer" {{old('job_type') == 'Volunteer' ? 'selected' : ''}}>Volunteer</option>
                    <option value="On-Call" {{old('job_type') == 'On-Call' ? 'selected' : ''}}>On-Call</option>
                </select>
                @error('job_type')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="remote"
                    >Remote</label
                >
                <select
                    id="remote"
                    name="remote"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                >
                    <option value="false">No</option>
                    <option value="true">Yes</option>
                </select>
            </div>

            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St" />

            <x-inputs.text id="city" name="city" label="City" placeholder="Albany" />

            <x-inputs.text id="state" name="state" label="State" placeholder="NY" />

            <x-inputs.text id="zipcode" name="zipcode" label="Zipcode" placeholder="12201" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">Company Info</h2>

            <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Enter company name" />

            <x-inputs.text-area id="company_description" name="company_description" label="Company Description" placeholder="Enter company description" />

            <x-inputs.text id="company_website" name="company_website" label="Company Website" placeholder="Enter website" />

            <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" placeholder="Enter contact phone" />

            <x-inputs.text id="contact_email" name="contact_email" label="Contact Email" type="email" placeholder="Enter contact email" />

            <div class="mb-4">
                <label class="block text-gray-700" for="company_logo"
                    >Company Logo</label
                >
                <input
                    id="company_logo"
                    type="file"
                    name="company_logo"
                    class="w-full px-4 py-2 border rounded focus:outline-none @error('company_logo') border-red-500 @enderror"
                />
                @error('company_logo')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none"
            >
                Save
            </button>
        </form>
    </div>
</x-layout>
