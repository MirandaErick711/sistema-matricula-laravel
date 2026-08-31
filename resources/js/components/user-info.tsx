import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { useInitials } from '@/hooks/use-initials';
import type { User } from '@/types';

export function UserInfo({
    user,
    showEmail = false,
}: {
    user: User;
    showEmail?: boolean;
}) {
    const getInitials = useInitials();

    const getRoleBadge = (rol?: string) => {
        switch (rol) {
            case 'admin':
                return {
                    label: 'Administrador',
                    className: 'bg-emerald-100 text-emerald-800 dark:bg-emerald-950 dark:text-emerald-300 border-emerald-300',
                };
            case 'docente':
                return {
                    label: 'Docente',
                    className: 'bg-amber-100 text-amber-800 dark:bg-amber-950 dark:text-amber-300 border-amber-300',
                };
            case 'estudiante':
            default:
                return {
                    label: 'Estudiante',
                    className: 'bg-blue-100 text-blue-800 dark:bg-blue-950 dark:text-blue-300 border-blue-300',
                };
        }
    };

    const roleInfo = getRoleBadge(user.rol);

    return (
        <div className="flex items-center gap-2.5 min-w-0">
            <Avatar className="h-8 w-8 overflow-hidden rounded-full ring-1 ring-border">
                <AvatarImage src={user.avatar} alt={user.name} />
                <AvatarFallback className="rounded-full bg-primary text-primary-foreground font-semibold text-xs">
                    {getInitials(user.name)}
                </AvatarFallback>
            </Avatar>
            <div className="grid flex-1 text-left text-sm leading-tight min-w-0">
                <span className="truncate font-semibold text-foreground">{user.name}</span>
                <div className="flex items-center gap-1.5 mt-0.5">
                    <span className={`inline-flex items-center rounded-full border px-1.5 py-0.2 text-[9px] font-bold uppercase tracking-wider ${roleInfo.className}`}>
                        {roleInfo.label}
                    </span>
                    {showEmail && (
                        <span className="truncate text-xs text-muted-foreground">
                            {user.email}
                        </span>
                    )}
                </div>
            </div>
        </div>
    );
}
