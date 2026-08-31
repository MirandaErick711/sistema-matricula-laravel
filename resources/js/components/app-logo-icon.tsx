import type { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon(props: ImgHTMLAttributes<HTMLImageElement>) {
    return (
        <img
            src="/images/logo-uns.png"
            alt="Logo UNS"
            className={`object-contain ${props.className || 'size-8'}`}
            {...props}
        />
    );
}
