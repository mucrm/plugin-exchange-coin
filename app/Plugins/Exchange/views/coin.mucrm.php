<div class="bg-zinc-950 text-zinc-400">
    @view('components.web.title', ['title'=> __lang('user.exchange.title')])

    <div class="p-6 space-y-6">
        <div class="flex justify-center">
            <a
                href="{{ route('user.panel') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md border border-zinc-800 text-xs font-bold uppercase tracking-widest text-zinc-500 hover:text-zinc-100 hover:bg-zinc-900 transition-all"
            >
                <i data-lucide="arrow-left" class="w-4 h-4"></i> {{ __lang('user.character.back') }}
            </a>
        </div>

        @view('components.web.alert-message')

        <div class="p-3 bg-amber-400/10 text-amber-600 text-sm">
            {{ __lang('user.exchange.info_note', [
                'remove_qty' => $info['quantity_remove'],
                'remove_name' => $configCoinDiscount['name'],
                'receive_qty' => $info['quantity_receive'],
                'receive_name' => $configCoinReceive['name']
            ]) }}
        </div>

        <form action="{{ route('plugins.coin.trade') }}" method="POST" class="space-y-6">
            @csrf 
            @view('components.web.input', [
                'type' => 'text', 
                'label' => __lang('user.exchange.input_label'),
                'model' => 'quantity',
                'placeholder' => "0"
            ]) 

            <div class="flex justify-center pt-4">
                @view('components.web.button-submit', ['title'=> __lang('user.exchange.submit_button')])
            </div>
        </form>
    </div>
</div>