<div>
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <form
        method="POST"
        action="/tweets"
        enctype="multipart/form-data">
        @csrf
            <textarea
                class="w-full"
                name="body"
                id="body"
                cols="30"
                rows="10"
                placeholder="What's up, doc?"
               >{{old('body')}}</textarea>

            <hr class="my-4">

            <footer class="flex justify-between items-center">
                <div class="flex items-center">
                    <img class="rounded-full"
                        src="{{current_user()->profile_photo_path }}"
                        width="55"
                        alt="">
                </div>
                <div class="mb-6 items-center">
                    <input class="border border-gray-400 p-2 w-full"
                           type="file"
                           name="attached_image"
                           id="attached_image"
                           accept="image/*"
                    >
                @error('attached_image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-3 text-white"
                    >Tweet a roo!
                </button>

            </footer>
        </form>
        @error('body')
            <p class="text-red-500 text-sm mt-2"> {{ $message}}</p>
        @enderror
    </div>


</div>

