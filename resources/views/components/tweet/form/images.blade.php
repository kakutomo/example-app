<div x-data="inputFormHandler()" class="my-2">
    <template x-for="(field, i) in fields" :key="i">
        <div class="w-full flex my-2">
            <label :for="field.id" class="border border-gray-300 rounded-md p-2 w-full bg-white cursor-pointer">
                <input type="file" accept="image/*" class="sr-only"
                :id="field.id" name="images[]" @change="fields[i].file = $event.target.files[0]">
                {{-- <span x-text="field.file ? field.file.name : '画像を選択'" class="text-gray-700"></span> --}}
                <span x-text="field.file ? field.file.name : '画像を選択'" class="text-gray-700"></span>
            </label>
            <button type="reset" @click="removeField(i)" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                </svg>

            </button>
        </div>
    </template>
    <template x-if="fields.length < 4">
        <button type="button" @click="addField()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm-center font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
            </svg>
            <span>画像を追加</span>
        </button>
    </template>
</div>

<script>
    function inputFormHandler(){
        return{
            fields:[],
            addField(){
                const i = this.fields.length;
                this.fields.push({
                    file: '',
                    id: `input-image-${i}`
                });
            },
            // addField(){
            //     const i = this.fields.length;
            //     const uniqueId = 'input-image-' + Math.random().toString(36).substr(2, 9); // ランダムな文字列を生成
            //     this.fields.push({
            //         file: '',
            //         id: uniqueId
            //     });
            // },
            removeField(index){
                this.fields.splice(index,1);
            }
        }
    }
</script>