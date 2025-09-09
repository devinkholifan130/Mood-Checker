<x-app-layout>
    <form method="POST" action="{{ route('mood.store') }}">
        @csrf
        <input type="checkbox" id="mood_modal" class="modal-toggle" @if (session('show_mood_modal')) checked @endif />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Apa perasaanmu hari ini?</h3>
                <div class="py-4 space-y-4">
                    <select name="feeling" class="select select-bordered w-full" required>
                        <option value="">Apa Perasaanmu...</option>
                        <option value="Senang">Senang</option>
                        <option value="Sedih">Sedih</option>
                        <option value="Marah">Marah</option>
                        <option value="Netral">Netral</option>
                    </select>
                    <textarea name="description" class="textarea textarea-bordered w-full" 
                    placeholder="Deskripsikan Perasaanmu" required></textarea>
                    <div class="modal-action">
                        <button type="submit" class="btn text-info" style="background-color: #CC5500">Submit</button>
                        <label for="mood_modal" class="btn btn-outline">Close</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="mood_modal" class="btn btn-info mb-4 font-bold" style="color: #CC5500;">Apa Perasanmu Hari Ini?</label>
            <div class="overflow-x-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hari & Tanggal</th>
                            <th>Perasaan</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <th>{{$item->created_at->timezone("Asia/Jakarta")}}</th>
                            <th>{{$item->feeling }}</th>
                            <th>{{$item->description }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>