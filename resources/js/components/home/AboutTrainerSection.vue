<script setup lang="ts">
const tags = ['Profesor IB', '10+ ani', 'AA & AI · SL & HL'];
</script>

<template>
    <section id="despre" class="bg-[#edeae0] py-[64px] md:py-[90px]">
        <div
            class="mx-auto max-w-6xl px-5 sm:px-6"
        >
            <!-- Photo -->
            <div
                class="relative mb-6 aspect-square w-full overflow-hidden rounded-[20px] shadow-[0_30px_60px_-34px_rgba(52,44,129,0.7)] md:float-left md:mr-10 md:mb-4 md:w-[440px]"
            >
                <img
                    src="/images/20251126_183442.webp"
                    alt="Profesorul de matematică IB"
                    class="h-full w-full object-cover"
                />
            </div>

            <!-- Body -->
            <div>
                <span
                    class="inline-flex items-center gap-[9px] font-mono text-[11.5px] font-bold tracking-[0.14em] text-brand-indigo-dark-2 uppercase"
                >
                    <span
                        class="inline-block h-[7px] w-[7px] rounded-[2px] bg-brand"
                    />
                    Cine predă
                </span>
                <h2
                    class="mt-3.5 text-[clamp(28px,3.2vw,38px)] font-bold tracking-[-0.01em] text-brand-indigo-dark-2"
                >
                    Profesor IB, nu meditator generalist
                </h2>
                <p
                    class="mt-[18px] text-[17px] leading-[1.65] text-brand-body text-justify"
                >
                    Sunt Denisa Diaconescu. Sunt
                    conferențiar la Facultatea de Matematică și Informatică
                    (Universitatea din București) și doctor în logică
                    matematică. Din 2008 am ghidat generații întregi de tineri.
                    Am predat atât în România, cât și la Universitatea din
                    Berna. Am făcut cercetare și am aplicat matematica în
                    academie și în industrie. Dar dincolo de diplome și articole
                    științifice … sunt mamă. Iar atunci când ești și profesor,
                    și părinte, vezi altfel lucrurile. După ani petrecuți în
                    universitate și în cercetare, am descoperit că adevărata
                    valoare a matematicii nu stă doar în rezultate, ci în felul
                    în care modelează gândirea. De aceea am creat Mindventure:
                    un spațiu unde ne conectăm cu copiii, le câștigăm
                    încrederea, respectăm ritmul fiecăruia și le arătăm că
                    matematica este frumoasă, logică și vie. Încă de mică îmi
                    așezam jucăriile și le “predam” povești inventate. Astăzi
                    fac același lucru, doar că poveștile mele sunt despre
                    logică, explorare și jocul gândirii. Vreau ca fiecare copil
                    care trece prin Mindventure să simtă că mintea lui este
                    puternică. Dacă vrei să afli mai multe despre parcursul meu
                    profesional, găsești detalii aici.
                </p>
                <div class="mt-6 flex flex-wrap gap-2.5">
                    <span
                        v-for="tag in tags"
                        :key="tag"
                        class="rounded-full border-[1.5px] border-brand-indigo-dark-2 px-3.5 py-2 font-mono text-[12px] font-bold tracking-[0.04em] text-brand-indigo-dark-2"
                    >
                        {{ tag }}
                    </span>
                </div>
            </div>
            <div class="clear-both" />
        </div>
    </section>
</template>
