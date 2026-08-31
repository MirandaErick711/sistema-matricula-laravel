import AppLogoIcon from '@/components/app-logo-icon';

export default function AppLogo() {
    return (
        <div className="flex items-center gap-3 min-w-0">
            <div className="flex aspect-square size-9 shrink-0 items-center justify-center rounded-xl bg-white p-0.5 shadow-sm ring-1 ring-border">
                <AppLogoIcon className="size-7 object-contain" />
            </div>
            <div className="flex flex-col text-left group-data-[collapsible=icon]:hidden min-w-0 transition-opacity">
                <div className="flex items-center gap-1.5">
                    <span className="font-extrabold tracking-tight text-foreground text-base leading-none">
                        SIIGAA
                    </span>
                    <span className="rounded bg-primary px-1.5 py-0.5 text-[10px] font-black tracking-wider text-primary-foreground uppercase">
                        UNS
                    </span>
                </div>
                <span className="text-[11px] font-semibold text-muted-foreground mt-0.5 leading-tight truncate">
                    Universidad Nacional del Santa
                </span>
            </div>
        </div>
    );
}
