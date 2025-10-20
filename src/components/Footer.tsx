const Footer = () => {
  return (
    <footer className="bg-primary py-12 text-primary-foreground">
      <div className="container mx-auto px-4">
        <div className="flex flex-col items-center justify-center gap-6 text-center">
          <div>
            <h2 className="text-3xl font-bold tracking-wider">HART</h2>
            <p className="mt-2 text-sm text-primary-foreground/80">Hart Living</p>
            <p className="mt-1 text-sm text-primary-foreground/60">Home is where Hart is</p>
          </div>
          <div className="w-full border-t border-primary-foreground/20 pt-6">
            <p className="text-sm text-primary-foreground/60">
              © 2025 Hart Living. All rights reserved
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
