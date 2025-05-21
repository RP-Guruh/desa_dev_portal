<x-filament::page>

    <x-filament::card>
        <h2 class="text-lg font-bold mb-2">Sambutan Kepala Desa</h2>
        
        <div class="mt-4">{!! $record->kata_sambutan ?? '<span class="italic opacity-50">Kata sambutan belum dibuat</span>' !!}</div>
    </x-filament::card>

    <x-filament::card>
        <h2 class="text-lg font-bold mb-2">Sejarah</h2>
        <div>{!! $record->sejarah ?? '<span class="italic opacity-50">Sejarah desa belum dibuat</span>' !!}</div>
    </x-filament::card>

    <x-filament::card>
        <h2 class="text-lg font-bold mb-2">Visi</h2>
        <div>{!! $record->visi?? '<span class="italic opacity-50">Visi desa belum dibuat</span>' !!}</div>
    </x-filament::card>

    <x-filament::card>
        <h2 class="text-lg font-bold mb-2">Misi</h2>
        <ol class="list-decimal pl-4">
            @forelse($misis as $misi)
                <li>
                    {{ $loop->iteration }}. {{ $misi->misi }}
                </li>
            @empty
                <li class="italic opacity-50">Misi desa belum dibuat</li>
            @endforelse
        </ol>
    </x-filament::card>



</x-filament::page>
