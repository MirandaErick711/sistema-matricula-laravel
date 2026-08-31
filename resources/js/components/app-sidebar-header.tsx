import { Breadcrumbs } from '@/components/breadcrumbs';
import { SidebarTrigger } from '@/components/ui/sidebar';
import type { BreadcrumbItem as BreadcrumbItemType } from '@/types';

export function AppSidebarHeader({
    breadcrumbs = [],
}: {
    breadcrumbs?: BreadcrumbItemType[];
}) {
    return (
        <header className="flex h-16 shrink-0 items-center justify-between border-b border-sidebar-border/60 bg-background/95 backdrop-blur px-4 sm:px-6">
            <div className="flex items-center gap-3">
                <SidebarTrigger className="size-8 rounded-lg hover:bg-sidebar-accent text-foreground hover:text-primary transition" />
                <div className="h-4 w-[1px] bg-border hidden sm:block" />
                <Breadcrumbs breadcrumbs={breadcrumbs} />
            </div>
            <div className="flex items-center gap-2">
                <span className="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-red-50 dark:bg-red-950/40 px-2.5 py-1 text-[11px] font-bold text-primary border border-red-200 dark:border-red-900/40">
                    <span className="size-1.5 rounded-full bg-primary" />
                    SIIGAA UNS
                </span>
            </div>
        </header>
    );
}
