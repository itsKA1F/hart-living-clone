const Hero = () => {
  return (
    <section className="relative w-full overflow-hidden bg-gradient-to-br from-[hsl(0,45%,25%)] to-[hsl(0,55%,35%)] py-24 md:py-32">
      <div className="absolute inset-0 opacity-10">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmlkKSIvPjwvc3ZnPg==')] bg-repeat"></div>
      </div>
      <div className="container relative mx-auto px-4">
        <div className="flex flex-col items-center justify-center text-center">
          <h1 className="text-7xl md:text-9xl font-bold tracking-wider text-secondary animate-in fade-in slide-in-from-bottom-4 duration-1000">
            HART
          </h1>
          <p className="mt-4 text-lg text-primary-foreground/80 animate-in fade-in slide-in-from-bottom-4 duration-1000 delay-200">
            Home is where Hart is
          </p>
        </div>
      </div>
    </section>
  );
};

export default Hero;
